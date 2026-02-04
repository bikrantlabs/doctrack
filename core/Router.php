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
        if ($callback == false) {

            $this->response->setStatusCode(404);
            return "Not found";
        }

        // If callback is string, render the view directly.
        if (is_string($callback))
            // The $callback is the filename. e.g. login.php, contact.php
            return $this->renderView($callback);


        // if callback is function, invoke it,
        if (is_callable($callback))
            return call_user_func($callback);


        // if callback is array, [Authcontroller.class, 'register']. 
        if (is_array($callback)) {
            [$class, $method] = $callback;
            $controller = new $class();
            return call_user_func([$controller, $method], $this->request);
        }
    }

    public function renderView($view, $params = [])
    {
        return $this->renderOnlyView($view, $params);
    }

    public function renderViewWithLayout(string $view, $layoutPath, $params = [])
    {

        $layoutContent = $this->layoutContent($layoutPath);
        $viewContent = $this->renderOnlyView($view, $params);


        return str_replace('{{content}}', $viewContent, $layoutContent);
    }


    protected function layoutContent($layoutPath)
    {
        ob_start(); // Start putting the outputted content(html contents in main.php) into the buffer
        include_once Application::$ROOT_DIR . "/views/layouts/$layoutPath.php";
        return ob_get_clean(); //get the buffer content and clear the buffer 
    }

    protected function renderOnlyView($view, $params = [])
    {

        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start(); // Start putting the outputted content(html contents in $view.php) into the buffer
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean(); //get the buffer content and clear the buffer 
    }
}
