<?php

namespace app\middlewares;

use app\core\Application;
use app\core\BaseMiddleware;
use app\core\Request;
use app\core\Response;

/**
 * This middleware will only allow authenticated users to proceed to request
 */
class AuthMiddleware extends BaseMiddleware
{

    public function execute(Request $request, Response $response)
    {
        if (!Application::isLoggedIn()) {
            $response->redirect('/login');
        }
    }
}