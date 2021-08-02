<?php
declare(strict_types=1);

namespace Component\EventDispatcher\Provider;

use ArrayIterator;
use Component\Routing\Matcher\UrlMatcher;
use Psr\EventDispatcher\ListenerProviderInterface;

class DefaultProvider implements ListenerProviderInterface
{

    private $listeners;

    public function __construct(array $listeners = [])
    {
        $this->listeners = $listeners;
    }

    public function getListenersForEvent(object $event): iterable
    {

        $iterator = new ArrayIterator();
        foreach ($this->listeners as $listener) {
            $iterator->append($listener);
        }

        return $iterator;
    }
}