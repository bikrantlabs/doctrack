<?php

namespace app\core;

class Controller
{
    public function render($view, $layout = "", $params = [])
    {
        if (empty($layout)) {
            $layout = "rootLayout";
        }
        return Application::$app->view->renderViewWithLayout($view, $layout, $params);
    }
}
