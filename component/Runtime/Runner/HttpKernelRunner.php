<?php
declare(strict_types=1);

namespace Component\Runtime\Runner;

use Component\Http\Request;
use Component\Kernel\HttpKernelInterface;
use Component\Runtime\RunnerInterface;
use Psr\Http\Message\RequestInterface;

class HttpKernelRunner implements RunnerInterface
{

    /**
     * @var HttpKernelInterface
     */
    private $httpKernel;
    /**
     * @var Request
     */
    private $request;

    public function __construct(HttpKernelInterface $httpKernel, RequestInterface $request)
    {
        $this->httpKernel = $httpKernel;
        $this->request = $request;
    }

    public function run(): int
    {
        $response = $this->httpKernel->handle($this->request);
        echo $response->getBody();
        return 0;
    }
}