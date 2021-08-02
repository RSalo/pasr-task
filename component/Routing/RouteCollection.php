<?php
declare(strict_types=1);

namespace Component\Routing;

class RouteCollection
{

    private $routes = [];

    public function add(string $name, Route $route)
    {
        $this->routes[$name] = $route;
    }

    public function get(string $name)
    {
        return $this->routes[$name] ?? null;
    }

    public function all()
    {
        return $this->routes;
    }

}