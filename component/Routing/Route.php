<?php
declare(strict_types=1);

namespace Component\Routing;

class Route
{
    private $regPath;
    /**
     * @var callable
     */
    private $controller;

    public function __construct(string $regPath = '^/\/', callable $controller)
    {
        $this->regPath = $regPath;
        $this->controller = $controller;
    }

    /**
     * @return string
     */
    public function getRegPath(): string
    {
        return $this->regPath;
    }

    /**
     * @param string $regPath
     */
    public function setRegPath(string $regPath): void
    {
        $this->regPath = $regPath;
    }

    /**
     * @return callable
     */
    public function getController(): callable
    {
        return $this->controller;
    }

    /**
     * @param callable $controller
     */
    public function setController(callable $controller): void
    {
        $this->controller = $controller;
    }
}