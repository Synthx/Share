<?php

namespace App;

class Route extends Router
{
    public $properties = [];
    public $method;
    public $uri;

    public static function get($uri, $action)
    {
        $self = new self;

        $identifier = explode('::', $action);

        $self->method = 'GET';
        $self->uri = $uri;
        $self->properties['controller'] = $identifier[0];
        $self->properties['method'] = $identifier[1];

        return $self;
    }

    public static function post($uri, $action)
    {
        $self = new self;

        $identifier = explode('::', $action);

        $self->method = 'POST';
        $self->uri = $uri;
        $self->properties['controller'] = $identifier[0];
        $self->properties['method'] = $identifier[1];

        return $self;
    }

    public function name($name)
    {
        $this->properties['name'] = $name;

        return $this;
    }

    public function middleware($middlewareName)
    {
        $this->properties['middleware'] = $middlewareName;

        return $this;
    }

    public function __destruct()
    {
        self::add($this->uri, $this->method, $this->properties);
    }
}