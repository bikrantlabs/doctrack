<?php

namespace app\core;

use Exception;

class Database
{

    public \PDO $pdo;
    public array $config;

    public function __construct(array $config)
    {
        $this->config = $config;
        $dsn = $config['DB_DSN'];
        $user = $config['DB_USER'];
        $password = $config['DB_PASS'];
        echo "Connecting to database with DSN: $dsn";
        echo "User: $user";
        echo "Password: $password" . PHP_EOL;
        $this->pdo = new \PDO($dsn, $user, $password);

        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function applyMigrations($migrationFolderPath, $sqlFolderPath)
    {
        $this->generateMigrationFileFromSQL($migrationFolderPath, $sqlFolderPath);
        $this->createMigrationsTable();
        $appliedMigrations = $this->getAppliedMigrations();


        $files = scandir($migrationFolderPath);
        $toApplyMigrations = array_diff($files, $appliedMigrations);

        $newMigrations = [];
        foreach ($toApplyMigrations as $migration) {
            if ($migration === "." || $migration === "..") {
                continue;
            }

            require_once($migrationFolderPath . "/$migration");

            $className = pathinfo($migration, PATHINFO_FILENAME);


            $instance = new $className();
            Application::log("Applying migration $migration...");
            $instance->up();
            Application::log("Successfully applied migration $migration...");

            $newMigrations[] = $migration; // Pushing to array
        }

        if (empty($newMigrations)) {
            Application::log("All migrations applied.");
        } else {
            $this->saveMigrations($newMigrations);
        }
    }


    public function createMigrationsTable()
    {
        $this->pdo->exec("
        CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) 
        ");
    }

    public function getAppliedMigrations(): array
    {
        $statement = $this->pdo->prepare("SELECT migration FROM migrations");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }


    /**
     * @throws Exception
     */
    private function saveMigrations(array $newMigrations)
    {
        if (empty($newMigrations)) {
            return;
        }

        try {
            $this->pdo->beginTransaction();
            // Multiple - bulk insert
            $placeholders = implode(',', array_fill(0, count($newMigrations), '(?)'));
            $stmt = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES $placeholders");
            $stmt->execute($newMigrations);


            $this->pdo->commit();
        } catch (Exception $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }

    /**
     *  This method will scan the sql/ folder and generate the corresponding migrations file with the
     *  same name as that of `sql` file
     */
    protected function generateMigrationFileFromSQL($migrationFolderPath, $sqlFolderPath)
    {
        $files = scandir($sqlFolderPath);
        foreach ($files as $file) {
            if ($file === "." || $file === "..") {
                continue;
            }


            $fileName = pathinfo($file, PATHINFO_FILENAME);
            $migrationFile = $fileName . ".php";

            $migrationFilePath = $migrationFolderPath . "/$migrationFile";
            if (!file_exists($migrationFilePath)) {
                $sqlContent = file_get_contents($sqlFolderPath . "/$file");
                if (empty($sqlContent)) {
                    throw new Exception("No content in SQL File $file");
                }
                $this->fillMigrationFileWithContent($migrationFilePath, $sqlContent);
            }

        }
    }

    protected function fillMigrationFileWithContent($filepath, $content)
    {

        $templatePath = __DIR__ . '/Migration_File_Content.txt';
        $template = file_get_contents($templatePath);
        $array = explode("/", $filepath);
        $filename = pathinfo(array_pop($array), PATHINFO_FILENAME);

        $template = str_replace("CLASSNAME", $filename, $template);
        $template = str_replace("SQL_CONTENT", $content, $template);

        $fileHandle = fopen($filepath, "w");
        fwrite($fileHandle, $template);
        fclose($fileHandle);
    }
}
