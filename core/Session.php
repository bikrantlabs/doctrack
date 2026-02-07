<?php

namespace app\core;

class Session
{
    protected const FLASH_KEY = "flash_messages";

    public function __construct()
    {
        session_start();

        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];

        // Mark all messages for removal initially
        foreach ($flashMessages as $key => &$message) {
            $message["toRemove"] = true;
        }

        $_SESSION[self::FLASH_KEY] = $flashMessages;
    }

    public function __destruct()
    {
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];

        foreach ($flashMessages as $key => &$message) {
            if ($message["toRemove"] === true) {
                unset($flashMessages[$key]);
            }
        }

        $_SESSION[self::FLASH_KEY] = $flashMessages;
    }

    public function setFlash(string $key, string $content, string $type = "info"): void
    {
        $_SESSION[self::FLASH_KEY][$key] = [
            "content" => $content,
            "type" => $type,
            "toRemove" => false,
            "displayed" => false, // NEW: Track if displayed
        ];
    }

    public function getFlash(string $key): array|false
    {
        if (!isset($_SESSION[self::FLASH_KEY][$key])) {
            return false;
        }

        $flash = $_SESSION[self::FLASH_KEY][$key];

        // If already displayed once, mark for removal immediately
        if ($flash["displayed"] === true) {
            unset($_SESSION[self::FLASH_KEY][$key]);
            return false;
        }

        // Mark as displayed but don't remove yet (allow display in current request)
        $_SESSION[self::FLASH_KEY][$key]["displayed"] = true;

        return [
            "content" => $flash["content"],
            "type" => $flash["type"]
        ];
    }

    public function getFlashes(): array
    {
        $result = [];
        foreach ($_SESSION[self::FLASH_KEY] ?? [] as $key => $message) {
            if ($message["displayed"] === false) {
                $_SESSION[self::FLASH_KEY][$key]["displayed"] = true;
                $result[$key] = [
                    "content" => $message["content"],
                    "type" => $message["type"]
                ];
            }
        }
        return $result;
    }

    public function get(string $key)
    {
        return $_SESSION[$key] ?? false;
    }

    public function set(string $key, string $value): void
    {
        $_SESSION[$key] = $value;
       
    }

    public function remove(string $key): void
    {
        unset($_SESSION[$key]);
    }
}