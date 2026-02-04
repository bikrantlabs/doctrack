<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\request\RegisterModel;

class AuthController extends Controller
{


    public function registerUser(Request $req)
    {

        $registerModel = new RegisterModel();
        if ($req->isGet()) {
            return $this->render("register", "auth", ["model" => $registerModel]); // viewname + layoutname
        }


        if ($req->isPost()) {
            $body = $req->getBody();

            $registerModel->loadData($body);

            if ($registerModel->validate()) {
                // Save user or perform other actions
                return $this->render("register", "auth", ["model" => $registerModel]);
            } else {
                return $this->render("register", "auth", ["model" => $registerModel]);
                // Handle validation errors
            }

            return $this->render("register", "auth", ["model" => $registerModel]);
        }
    }
}
