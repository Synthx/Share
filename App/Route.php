<?php

namespace App;

class Route extends Router
{
    public $properties = [];
    public $method;
    public $uri;

    /**
     * Add a new GET route
     * @param  string $uri
     * @param  string $action
     * @return Route
     */
    public static function get(string $uri, string $action): self
    {
        $self = new self;

        $identifier = explode('::', $action);

        $self->method = 'GET';
        $self->uri = $uri;
        $self->properties['controller'] = $identifier[0];
        $self->properties['method'] = $identifier[1];

        return $self;
    }

    /**
     * Add a new POST route
     * @param  string $uri
     * @param  string $action
     * @return Route
     */
    public static function post(string $uri, string $action): self
    {
        $self = new self;

        $identifier = explode('::', $action);

        $self->method = 'POST';
        $self->uri = $uri;
        $self->properties['controller'] = $identifier[0];
        $self->properties['method'] = $identifier[1];

        return $self;
    }

    /**
     * Add name to current registered route
     * @param  string $name
     * @return Route
     */
    public function name(string $name): self
    {
        $this->properties['name'] = $name;

        return $this;
    }

    /**
     * Add middleware to current registered route
     * @param  string $middlewareName
     * @return Route
     */
    public function middleware(string $middlewareName): self
    {
        $this->properties['middleware'] = $middlewareName;

        return $this;
    }

    /**
     * Register the current route
     */
    public function __destruct()
    {
        self::add($this->uri, $this->method, $this->properties);
    }
}