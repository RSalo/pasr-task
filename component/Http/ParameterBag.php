<?php
declare(strict_types=1);

namespace Component\Http;

use function array_key_exists;

class ParameterBag
{
    protected $parameters;

    public function __construct(array $parameters = [])
    {
        $this->parameters = $parameters;
    }

    public function get(string $key, $default = null): string
    {
        return array_key_exists($key, $this->parameters) ? $this->parameters[$key] : $default;
    }
}