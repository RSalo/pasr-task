<?php
declare(strict_types=1);

namespace Component\Routing\Matcher;

use Component\Routing\RouteCollection;
use Psr\Http\Message\RequestInterface;

class UrlMatcher implements RequestMatcherInterface
{

    private $routeCollection;

    public function __construct(RouteCollection $routeCollection)
    {
        $this->routeCollection = $routeCollection;
    }

    public function matchRequest(RequestInterface $request): array
    {

        if (($target = $request->getRequestTarget()) === '/') {
            return [];
        }

        if (($pos = strpos($target, '?'))) {
            $target = substr($target, 0, $pos);
        }

        if ($target !== '' && $target[0] !== '/') {
            $target = '/' . $target;
        }

        $routes = $this->routeCollection->all();

        foreach ($routes as $name => $route) {
            $routePath = $route->getRegPath();
            if (!preg_match($routePath, $target, $matches)) {
                continue;
            }
            return ['_route' => $name, '_controller' => $route->getController()];
        }
        return [];
    }
}