<?php
declare(strict_types=1);

namespace Component\Runtime;

use Component\Http\Request;
use Component\Kernel\HttpKernelInterface;
use Component\Runtime\Runner\ClosureRunner;
use Component\Runtime\Runner\HttpKernelRunner;

class GenericRuntime implements RuntimeInterface
{

    public function getRunner(?object $application): RunnerInterface
    {
        if ($application instanceof HttpKernelInterface) {
            return new HttpKernelRunner($application, Request::createFromGlobals());
        }

        return new ClosureRunner(function () {
            return 0;
        });
    }
}