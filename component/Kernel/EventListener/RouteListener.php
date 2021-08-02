<?php
declare(strict_types=1);

namespace Component\Kernel\EventListener;

use Component\Kernel\Event\RequestEvent;
use Component\Routing\Matcher\RequestMatcherInterface;

class RouteListener
{

    private $requestMatcher;

    public function __construct(RequestMatcherInterface $requestMatcher)
    {
        $this->requestMatcher = $requestMatcher;
    }

    public function onKernelRequest(RequestEvent $requestEvent)
    {
        if ($requestEvent->getRequest()->getAttribute('_controller')) {
            return;
        }

        $matcher = $this->requestMatcher->matchRequest($requestEvent->getRequest());

        foreach ($matcher as $name => $match) {
            $requestEvent->getRequest()->withAttribute($name, $match);
        }
    }

}