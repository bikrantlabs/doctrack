<?php

require_once __DIR__ . "/vendor/autoload.php";

use app\core\Application;
use Dotenv\Dotenv;

// It's like importing the package

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$ROOT_DIR = __DIR__;

$CONFIG = [
    "db" => [
        "DB_DSN"=>$_ENV['DB_DSN'], // dsn
        "DB_USER"=> $_ENV['DB_USER'], //user
        "DB_PASS"=>$_ENV['DB_PASS'], //pass
        "MIGRATION_FOLDER_PATH" => __DIR__ . "/migrations",
        "SQL_FOLDER_PATH" => __DIR__ . "/sql",
    ]
];

$app = new Application($ROOT_DIR, $CONFIG);

$app->db->applyMigrations(__DIR__ . "/migrations",__DIR__ . "/sql" );
