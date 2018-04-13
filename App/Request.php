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

    /**
     * Acces request param with magic method
     * @param  $name
     * @return mixed
     */
    public function __get($name)
    {
        $value = $this->input($name);

        if ($value == '')
            return $this->get($name);

        return $value;
    }

    /**
     * Return true if the request param exist
     * @param  string $name
     * @param  string $method
     * @return boolean
     */
    private function _exist(string $name, string $method): bool
    {
        return array_key_exists($name, $this->_requests[$method]);
    }

    /**
     * Get POST param with name
     * @param  string $name
     * @param  string $default
     * @return mixed
     */
    public function input(string $name, $default='')
    {
        if (!$this->_exist($name, 'POST'))
            return $default;

        return $this->_requests['POST'][$name];
    }

    /**
     * Get GET param with name
     * @param  string $name
     * @param  string $default
     * @return mixed
     */
    public function get(string $name, $default='')
    {
        if (!$this->_exist($name, 'GET'))
            return $default;

        return $this->_requests['GET'][$name];
    }

    /**
     * Get all POST params
     * @return array
     */
    public function inputs(): array
    {
        return $this->_requests['POST'];
    }

    /**
     * Get all GET params
     * @return array
     */
    public function queries(): array
    {
        return $this->_requests['GET'];
    }

    /**
     * Get all request params (GET & POST)
     * @return array
     */
    public function all(): array
    {
        return array_merge($this->_requests['GET'], $this->_requests['POST']);
    }
}