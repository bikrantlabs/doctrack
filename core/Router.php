<?php

namespace app\core;

class Router
{

    protected array $routes = [];
    private Request $request;
    private Response $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();


        // Get the callback for given method and path
        $callback = $this->routes[$method][$path] ?? false;
        if (!$callback) {

            $this->response->setStatusCode(404);
            $fileExists = file_exists(Application::$ROOT_DIR . "/views/not_found.php");
            if ($fileExists) {
                return Application::$app->view->renderViewWithLayout("not_found", "rootLayout", []);
            }
            return "Not found";
        }

        // If callback is string, render the view directly.
        if (is_string($callback))
            // The $callback is the filename. e.g. login.php, contact.php
            return Application::$app->view->renderViewWithLayout($callback, "rootLayout", []);


        // if callback is function, invoke it,
        if (is_callable($callback))
            return call_user_func($callback);


        // if callback is array, [Authcontroller.class, 'register']. 
        if (is_array($callback)) {

            [$class, $method] = $callback;
            $middlewares = $callback[2] ?? null;
            if (!empty($middlewares)) {
                foreach ($middlewares as $middleware) {
                    $middleware->execute($this->request, $this->response);
                }
            }

            $controller = new $class();
            return call_user_func([$controller, $method], $this->request, $this->response);
        }
        return "Not Found";
    }


}
