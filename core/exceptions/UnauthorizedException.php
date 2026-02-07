<?php

namespace app\core\exceptions;

class UnauthorizedException extends \Exception
{

    protected $code = 401;
    protected $message = "Unauthorized";

}