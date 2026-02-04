<?php

use app\core\Application;

class m0001_initial
{
    public function up()
    {

        try {
            $db = Application::$app->db;
            $SQL = "CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) UNIQUE  NOT NULL,
  fullname VARCHAR(255) NOT NULL,
  password VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);";
            $db->pdo->exec($SQL);

        } catch (Exception $e) {
            Application::log(__CLASS__ . " Failed to create tables. " . $e->getMessage());
        }
    }

    public function down()
    {
        throw new Exception("Not implemented");
    }
}
