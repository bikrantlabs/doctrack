<?php

namespace app\core;

class Controller
{
    public function render($view, $layout = "", $params = [])
    {
        if (empty($layout)) {
            return Application::$app->router->renderView($view, $params);
        }
        return Application::$app->router->renderViewWithLayout($view, $layout, $params);
    }
}
