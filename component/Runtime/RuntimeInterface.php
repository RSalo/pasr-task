<?php
declare(strict_types=1);

namespace Component\Runtime;

interface RuntimeInterface
{
    public function getRunner(?object $application): RunnerInterface;
}