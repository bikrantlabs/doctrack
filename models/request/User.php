<?php

namespace app\models\request;

use app\core\Application;
use app\core\DBModel;

class User extends DBModel
{
    public string $fullname = '';
    public string $email = '';
    public string $password = '';
    public string $confirmPassword = '';

    public array $uniqueAttributes = ["email"];


    public function save(array $uniqueAttributes = []): bool
    {
        $this->password = password_hash($this->password, PASSWORD_ARGON2ID);
        Application::log("Saving user: " . $this->fullname);
        return parent::save($this->uniqueAttributes);
    }

    public function rules(): array
    {
        return [
            "fullname" => ["required", ["min", 3], ["max", 50]],
            "email" => ["required", "email"],
            "password" => ["required", ["min", 8], ["max", 127]],
            "confirmPassword" => ["required", ["match", "password"]]
        ];
    }

    public function tableName(): string
    {
        return "users";
    }

    public function attributes(): array
    {
        return ["fullname", "email", "password",];
    }

    public function resetPasswordField(): void
    {
        $this->password = "";
        $this->confirmPassword = "";
    }

    public function labels(): array
    {
        return [
            "fullname" => "Fullname",
            "email" => "Email",
            "password" => "Password",
            "confirmPassword" => "Confirm Password",
        ];
    }
}
