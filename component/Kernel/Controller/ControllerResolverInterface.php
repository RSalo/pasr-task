<?php
declare(strict_types=1);

namespace Component\Kernel\Controller;

use Psr\Http\Message\RequestInterface;

interface ControllerResolverInterface
{
    public function getController(RequestInterface $request);
}