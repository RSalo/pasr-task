<?php
declare(strict_types=1);

namespace Component\Routing\Matcher;

use Psr\Http\Message\RequestInterface;

interface RequestMatcherInterface
{
    public function matchRequest(RequestInterface $request): array;
}