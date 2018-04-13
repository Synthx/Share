<?php

namespace App;

class Session
{
    /**
     * Store a new session
     * @param string $key
     * @param mixed $value
     */
    public static function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Retrieve session value with key
     * @param  string $key
     * @param  mixed $default
     * @return mixed
     */
    public static function get(string $key, $default='')
    {
        if (!self::exist($key))
            return $default;

        return $_SESSION[$key];
    }

    /**
     * Delete session with key
     * @param  string $key
     */
    public static function destroy(string $key)
    {
        unset($_SESSION[$key]);
    }

    /**
     * Check if session with key exist
     * @param  string $key
     * @return boolean
     */
    public static function exist(string $key): bool
    {
        return array_key_exists($key, $_SESSION);
    }

    /**
     * Store a new flash session
     * @param string $key
     * @param string $type
     * @param mixed $value
     */
    public static function setFlash(string $key, string $type, $value)
    {
        if (!array_key_exists($type, $_SESSION))
            $_SESSION[$type] = [];

        $_SESSION[$type][$key] = $value;
    }

    /**
     * Check if flash session with key exist
     * @param  string $key
     * @param  string $type
     * @return boolean
     */
    public static function existFlash(string $key, string $type): bool
    {
        if (!self::exist($type))
            return false;

        return array_key_exists($key, $_SESSION[$type]);
    }

    /**
     * Retrieve flash session value with key
     * @param  string $key
     * @param  string $type
     * @param  mixed $default
     * @return mixed
     */
    public static function getFlash(string $key, string $type, $default='')
    {
        if (!self::existFlash($key, $type))
            return $default;

        return $_SESSION[$type][$key];
    }

    /**
     * Delete all flash session
     */
    public static function cleanFlash()
    {
        unset($_SESSION['flash'], $_SESSION['old'], $_SESSION['errors']);
    }
}