<?php
declare(strict_types=1);

namespace Component\Runtime;

interface RunnerInterface
{
    public function run(): int;
}