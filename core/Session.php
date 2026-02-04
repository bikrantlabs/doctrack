<?php

namespace app\core;

class Session
{

    protected const FLASH_KEY = "flash_messages";

    public function __construct()
    {
        session_start();
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($flashMessages as $key => &$message) {
            //  Mark them to be removed.
            $message["toRemove"] = true;
        }
        $_SESSION[self::FLASH_KEY] = $flashMessages;
    }

    public function __destruct()
    {
        // Iterate over marked to be removed message and  remove them.
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($flashMessages as $key => &$message) {
            //  Mark them to be removed.
            if (isset($message["toRemove"]) && $message["toRemove"] === true) {
                unset($flashMessages[$key]);
            }
        }
        $_SESSION[self::FLASH_KEY] = $flashMessages;
    }

    public function setFlash(string $key, string $message)
    {
        $_SESSION[self::FLASH_KEY][$key] = [
            "message" => $message,
            "toRemove" => false,
        ];
    }

    public function getFlash(string $key): string
    {
        return $_SESSION[self::FLASH_KEY][$key]["message"] ?? false;
    }
}