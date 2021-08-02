<?php
declare(strict_types=1);

namespace Component\Kernel\Controller;

use Psr\Http\Message\RequestInterface;

class ControllerResolver implements ControllerResolverInterface
{
    public function getController(RequestInterface $request)
    {
        if (!$controller = $request->getAttribute('_controller')) {
            return false;
        }

        return $controller;
    }
}