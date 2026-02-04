<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\request\User;

class AuthController extends Controller
{


    public function registerUser(Request $req, Response $response)
    {

        $userModel = new User();
        if ($req->isGet()) {
            return $this->render("register", "auth", ["model" => $userModel]); // viewname + layoutname
        }


        if ($req->isPost()) {
            $body = $req->getBody();

            $userModel->loadData($body);

            if ($userModel->validate()) {
                $userModel->save();
                // Save user or perform other actions

                $userModel->resetPasswordField();
                Application::$app->session->setFlash("success", "Your account has been created.");
                $response->redirect("/");
                return $this->render("register", "auth", ["model" => $userModel]);
            } else {
                return $this->render("register", "auth", ["model" => $userModel]);
                // Handle validation errors
            }
        }
        $response->setStatusCode(405);
        return "Method Not Allowed";
    }
}
