<?php

namespace app\core;

abstract class BaseMiddleware
{
    abstract public function execute(Request $request, Response $response);
}