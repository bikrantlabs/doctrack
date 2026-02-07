<?php

namespace app\core;

class View
{
    public string $title = "";

    public function renderViewWithLayout(string $view, $layoutPath, $params = [])
    {

        // Get the inner layout content (could be main, auth, etc. or rootLayout itself)

        $viewContent = $this->renderOnlyView($view, $params);

        $layoutContent = $this->layoutContent($layoutPath);

        // Replace {{content}} in the inner layout
        $innerWrappedContent = str_replace('{{content}}', $viewContent, $layoutContent);

        // If the layout we're using is already rootLayout, we're done
        if ($layoutPath === 'rootLayout') {

            return $innerWrappedContent;
        }


        // Otherwise, wrap the whole thing with rootLayout
        $rootLayoutContent = $this->layoutContent('rootLayout');
        return str_replace('{{content}}', $innerWrappedContent, $rootLayoutContent);
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