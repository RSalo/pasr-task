<?php
declare(strict_types=1);

namespace Component\Runtime\Runner;

use Closure;
use Component\Runtime\RunnerInterface;

class ClosureRunner implements RunnerInterface
{

    /**
     * @var Closure
     */
    private $closure;

    public function __construct(Closure $closure)
    {
        $this->closure = $closure;
    }

    public function run(): int
    {
        return ($this->closure)() ?? 0;
    }
}