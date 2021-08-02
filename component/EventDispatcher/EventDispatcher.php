<?php
declare(strict_types=1);

namespace Component\EventDispatcher;

use Fig\EventDispatcher\ParameterDeriverTrait;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\EventDispatcher\ListenerProviderInterface;
use function get_class;

class EventDispatcher implements EventDispatcherInterface
{

    use ParameterDeriverTrait;

    private $listenerProvider;

    public function __construct(ListenerProviderInterface $listenerProvider)
    {
        $this->listenerProvider = $listenerProvider;
    }

    /**
     * @inheritDoc
     */
    public function dispatch(object $event)
    {
        $listeners = $this->listenerProvider->getListenersForEvent($event);

        foreach ($listeners as $listener) {
            if ($this->getParameterType($listener) === get_class($event)) {
                $listener($event);
            }
        }

        return $event;
    }
}