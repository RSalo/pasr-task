<?php
declare(strict_types=1);

namespace App;


use Component\Kernel\Controller\ControllerResolverInterface;
use Component\Kernel\Event\RequestEvent;
use Component\Kernel\HttpKernelInterface;
use Exception;
use Fig\Http\Message\StatusCodeInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Kernel implements HttpKernelInterface
{

    private $controllerResolver;
    private $eventDispatcher;

    public function __construct(ControllerResolverInterface $controllerResolver, EventDispatcherInterface $eventDispatcher)
    {
        $this->controllerResolver = $controllerResolver;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        $requestEvent = new RequestEvent($this, $request);
        $this->eventDispatcher->dispatch($requestEvent);

        if ($requestEvent->hasResponse()) {
            return $requestEvent->getResponse();
        }

        if (($controller = $this->controllerResolver->getController($request)) === false) {
            throw new Exception('Controller was not found.', StatusCodeInterface::STATUS_NOT_FOUND);
        }

        return $controller();
    }
}