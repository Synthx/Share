<?php

namespace App;

class Request
{
    private $_requests = [
        'GET' => [],
        'POST' => []
    ];

    public function __construct()
    {
        foreach ($_POST as $key => $value)
            $this->_requests['POST'][$key] = $value;
        foreach ($_GET as $key => $value)
            $this->_requests['POST'][$key] = $value;
    }

    public function __get($name)
    {
        $value = $this->input($name);

        if ($value == '')
            return $this->get($name);

        return $value;
    }

    private function _exist($name, $method)
    {
        return array_key_exists($name, $this->_requests[$method]);
    }

    public function input($name, $default = '')
    {
        if (!$this->_exist($name, 'POST'))
            return $default;

        return $this->_requests['POST'][$name];
    }

    public function get($name, $default='')
    {
        if (!$this->_exist($name, 'GET'))
            return $default;

        return $this->_requests['GET'][$name];
    }

    public function inputs()
    {
        return $this->_requests['POST'];
    }

    public function queries()
    {
        return $this->_requests['GET'];
    }

    public function all()
    {
        return array_merge($this->_requests['GET'], $this->_requests['POST']);
    }
}