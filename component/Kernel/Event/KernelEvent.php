<?php
declare(strict_types=1);

namespace Component\Kernel\Event;

use Component\Kernel\HttpKernelInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;

class KernelEvent
{

    private $httpKernel;
    private $request;

    public function __construct(HttpKernelInterface $httpKernel, RequestInterface $request)
    {
        $this->httpKernel = $httpKernel;
        $this->request = $request;
    }

    /**
     * @return ServerRequestInterface
     */
    public function getRequest(): ServerRequestInterface
    {
        return $this->request;
    }

}