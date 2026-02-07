<?php

namespace app\core;

class Application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;

    public ?UserModel $user = null;
    public string $userClass;

    public Session $session;


    public static Application $app;

    public function __construct($rootPath, array $config)

    {
        $this->userClass = $config['userClass'] ?? null;
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();

        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);

        if ($this->userClass) {
            $instance = new $this->userClass();
            $primaryValue = $this->session->get("user_id");
            if ($primaryValue) {
                $primaryKey = $instance->primaryKey();
                $this->user = $instance->findUnique([$primaryKey => $primaryValue]);
                unset($this->user->password);
            }
        }
    }

    public static function isLoggedIn()
    {
        return isset(self::$app->user);
    }


    public function run(): void
    {
        echo $this->router->resolve();
    }

    public static function log($message): void
    {
        echo '[' . date("Y-m-d H:i:s") . '] - ' . $message . PHP_EOL;
    }

    public function login($user): bool
    {

        $this->user = $user;
        $primaryKey = $user->primaryKey();

        $identifier = $user->{$primaryKey};

        $this->session->set("user_id", $identifier);
        return true;
    }

    public function logout(): void
    {
        $this->user = null;
        $this->session->remove("user_id");
    }
}
