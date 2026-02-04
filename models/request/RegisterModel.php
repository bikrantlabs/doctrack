<?php

namespace app\models\request;

use app\core\Model;

class RegisterModel extends Model
{
    public string $fullname = '';
    public string $email = '';
    public string $password = '';
    public string $confirmPassword = '';

    public function rules(): array
    {
        return [
            "fullname" => ["required", ["min", 3], ["max", 50]],
            "email" => ["required", "email"],
            "password" => ["required", ["min", 8], ["max", 127]],
            "confirmPassword" => ["required", ["match", "password"]]
        ];
    }
}
