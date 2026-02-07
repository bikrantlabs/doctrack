<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\request\LoginFormModel;
use app\models\User;

class AuthController extends Controller
{
    public function registerUser(Request $req, Response $response)
    {

        $userModel = new User();
        if ($req->isGet()) {
            return $this->render("register", "", ["model" => $userModel]); // viewname + layoutname
        }


        if ($req->isPost()) {
            $body = $req->getBody();

            $userModel->loadData($body);

            if ($userModel->validate()) {
                $userModel->save();
                // Save user or perform other actions

                $userModel->resetPasswordField();
                Application::$app->session->setFlash("register_success", "Your account has been created.", "success");
                $response->redirect("/");
                return;
            } else {
                Application::$app->session->setFlash("register_failed", "Failed to register.", "error");
                return $this->render("register", "", ["model" => $userModel]);
                // Handle validation errors
            }
        }
        $response->setStatusCode(405);
        return "Method Not Allowed inRegister";
    }

    public function loginUser(Request $req, Response $response)
    {

        $loginForm = new LoginFormModel();
        if ($req->isGet()) {
            return $this->render("login", "", ["model" => $loginForm]); // viewname + layoutname
        }
        if ($req->isPost()) {
            $body = $req->getBody();
            $loginForm->loadData($body);

            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect("/");
                return;
            }
            Application::$app->session->setFlash("login_failed", "Failed to login.", "error");
            return $this->render("login", "", ["model" => $loginForm]);

        }


        $response->setStatusCode(405);
        return "Method Not Allowed";
    }

    public function logout(Request $req, Response $response)
    {
        if ($req->isGet()) {
//            Redirect to home page
            $response->redirect("/");
            return;
        }
        if ($req->isPost()) {

            Application::$app->logout();
            $response->redirect("/");
            return;
        }

        $response->setStatusCode(405);
        return "Method Not Alloweds";

    }
}
