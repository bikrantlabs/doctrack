<?php

namespace app\models\request;

use app\core\Application;
use app\core\Model;
use app\models\User;

class LoginFormModel extends Model
{
    public string $email = '';
    public string $password = '';

    public function login(): bool
    {
        $user = (new User())->findUnique(['email' => $this->email]);

        if (!$user || !password_verify($this->password, $user->password)) {
            $this->addError("email", "Incorrect email or password");
            $this->addError("password", "Incorrect email or password");
            return false;
        }

        return Application::$app->login($user);

    }

    protected function rules(): array
    {
        return [
            "email" => ["required", "email"],
            "password" => ["required", ["min", 8], ["max", 127]],
        ];
        // TODO: Implement rules() method.
    }

    public function labels(): array
    {
        return [

            "email" => "Email",
            "password" => "Password",

        ];
    }
}