<?php
// phpinfo();
ini_set('log_errors', '1');
ini_set('error_reporting', E_ALL);
ini_set('display_errors', '1'); // DEV only

require_once __DIR__ . "/../vendor/autoload.php";

use app\controllers\AuthController;
use app\controllers\SiteController;
use app\core\Application; // It's like importing the package 
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$ROOT_DIR = dirname(__DIR__);

$CONFIG = [
    "db" => [
        $_ENV['DB_DSN'], // dsn
        $_ENV['DB_USER'], //user
        $_ENV['DB_PASS'] //pass
    ]
];

$app = new Application($ROOT_DIR, $CONFIG);

$app->router->get("/", [SiteController::class, "home"]);

$app->router->get("/register", [AuthController::class, 'registerUser']);
$app->router->post("/register", [AuthController::class, 'registerUser']); // registerUser method of AuthController

$app->run();
