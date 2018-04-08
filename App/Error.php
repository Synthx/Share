<?php

namespace App;

class Error
{
    private $_errors = [];

    public function __construct()
    {
        $this->_errors = Session::get('errors', []);
    }

    public function all()
    {
        return array_values($this->_errors);
    }

    public function has($key)
    {
        return array_key_exists($key, $this->_errors);
    }

    public function get($key)
    {
        return $this->_errors[$key];
    }

    public function count()
    {
        return count($this->_errors);
    }
}