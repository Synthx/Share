<?php

namespace App;

class Session
{
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default='')
    {
        if (!self::exist($key))
            return $default;

        return $_SESSION[$key];
    }

    public static function destroy($key)
    {
        unset($_SESSION[$key]);
    }

    public static function exist($key)
    {
        return array_key_exists($key, $_SESSION);
    }

    public static function setFlash($key, $type, $value)
    {
        if (!array_key_exists($type, $_SESSION))
            $_SESSION[$type] = [];

        $_SESSION[$type][$key] = $value;
    }

    public static function existFlash($key, $type)
    {
        if (!self::exist($type))
            return false;

        return array_key_exists($key, $_SESSION[$type]);
    }

    public static function getFlash($key, $type, $default='')
    {
        if (!self::existFlash($key, $type))
            return $default;

        return $_SESSION[$type][$key];
    }

    public static function cleanFlash()
    {
        unset($_SESSION['flash'], $_SESSION['old'], $_SESSION['errors']);
    }
}