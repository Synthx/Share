<?php

namespace App;

use Exception;

class Router extends Handler
{
    private static $_routes = [
        'GET' => [],
        'POST' => []
    ];
    private static $_names = [
        'GET' => [],
        'POST' => []
    ];

    /**
     * Register a new route
     * @param string $uri
     * @param string $method
     * @param array  $properties
     */
    public static function add(string $uri, string $method, array $properties)
    {
        if (self::existWithUri($uri, $method)) {
            print_r(self::$_routes);
            throw new Exception("Route with uri [{$uri}] already define", 1);
        }

        if (isset($properties['name']) && self::exist($properties['name']))
            throw new Exception("Route with name [{$properties['name']}] already define", 1);

        self::$_routes[$method][$uri] = $properties;

        if (isset($properties['name']))
            self::$_names[$method][$properties['name']] = $uri;
    }

    /**
     * Check if route with name already exist
     * @param  string $name
     * @return boolean
     */
    public static function exist(string $name): bool
    {
        return array_key_exists($name, self::$_names['GET']) || array_key_exists($name, self::$_names['POST']);
    }

    /**
     * Check if route with uri already exist
     * @param  string $uri
     * @param  string $method
     * @return boolean
     */
    public static function existWithUri(string $uri, string $method): bool
    {
        return in_array($method, array_keys(self::$_routes)) && array_key_exists($uri, self::$_routes[$method]);
    }

    /**
     * Match route with uri
     * @param  string $uri
     */
    public static function match(string $uri)
    {
        if (!self::existWithUri($uri, METHOD))
            self::handleCode(404);

        $properties = self::$_routes[METHOD][$uri];

        if (!file_exists(DIR . '/Controllers/' . $properties['controller'] . '.php'))
            throw new Exception("Controller [{$properties['controller']}] not found", 0);

        if (!method_exists('Controllers\\' . $properties['controller'], $properties['method']))
            throw new Exception("Undefined method [{$properties['method']}] in controller [{$properties['controller']}]", 2);

        if (isset($properties['middleware']))
        {
            if (!file_exists(DIR . '/Middlewares/' . $properties['middleware'] . '.php'))
                throw new Exception("Middleware [{$properties['middleware']}] not found.", 2);

            $className = 'Middlewares\\' . $properties['middleware'];

            $middleware = new $className;
            $middleware->rule();
        }

        $className = "Controllers\\" . $properties['controller'];

        $controller = new $className;
        $controller->{$properties['method']}();
    }

    /**
     * Return current route name
     * @return string
     */
    public static function current(): string
    {
        $currentUri = (isset($_REQUEST['uri'])) ? $_REQUEST['uri'] : '/' ;

        if (!self::existWithUri($currentUri, METHOD))
            return '404';

        return self::$_routes[METHOD][$currentUri]['name'];
    }

    /**
     * Return route uri with name
     * @param  string $name
     * @return string
     */
    public static function url(string $name): string
    {
        if (!self::exist($name))
            throw new Exception("Undefined route name [{$name}]", 1);

        $array = (array_key_exists($name, self::$_names['GET'])) ? self::$_names['GET'] : self::$_names['POST'] ;

        $uri = ($name == 'home') ? URL . $array[$name] : URL . '/' . $array[$name] ;

        return $uri;
    }

    /**
     * Return uri
     * @param  string $uri
     * @return string
     */
    public static function to(string $uri): string
    {
        return URL . $uri;
    }
}