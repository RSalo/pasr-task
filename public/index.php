<?php
declare(strict_types=1);

use App\Controller\IndexController;
use App\Kernel;
use Component\EventDispatcher\EventDispatcher;
use Component\EventDispatcher\Provider\DefaultProvider;
use Component\EventDispatcher\Provider\KernelProvider;
use Component\Kernel\Controller\ControllerResolver;
use Component\Kernel\Event\RequestEvent;
use Component\Kernel\EventListener\RouteListener;
use Component\Routing\Matcher\UrlMatcher;
use Component\Routing\Route;
use Component\Routing\RouteCollection;
use Component\Runtime\GenericRuntime;
use Fig\EventDispatcher\DelegatingProvider;

require_once __DIR__ . '/../vendor/autoload.php';

$routeCollection = new RouteCollection();
$routeCollection->add('second', new Route('/\/index.php\/second/', [IndexController::class, 'second']));
$routeCollection->add('index', new Route('/\/index.php/', [IndexController::class, 'index']));

$kernelListeners = [
    [new RouteListener(new UrlMatcher($routeCollection)), 'onKernelRequest']
];

$events = new DelegatingProvider();
$events->setDefaultProvider(new DefaultProvider());
$events->addProvider(new KernelProvider($kernelListeners), [
    RequestEvent::class
]);

$runner = new GenericRuntime();
exit($runner->getRunner(
    new Kernel(
        new ControllerResolver(),
        new EventDispatcher($events)
    )
)->run());