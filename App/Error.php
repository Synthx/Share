<?php

namespace App;

class Error
{
    private $_errors = [];

    public function __construct()
    {
        $this->_errors = Session::get('errors', []);
    }

    /**
     * Get all errors
     * @return array
     */
    public function all(): array
    {
        return array_values($this->_errors);
    }

    /**
     * Test if an error exist
     * @param  string  $key
     * @return boolean
     */
    public function has(string $key): bool
    {
        return array_key_exists($key, $this->_errors);
    }

    /**
     * Get an error
     * @param  string $key
     * @return string
     */
    public function get(string $key): string
    {
        return $this->_errors[$key];
    }

    /**
     * Count number of errors
     * @return [type] [description]
     */
    public function count(): int
    {
        return count($this->_errors);
    }
}