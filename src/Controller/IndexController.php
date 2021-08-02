<?php
declare(strict_types=1);

namespace App\Controller;

use Component\Http\Response;
use Component\Http\Stream;
use Psr\Http\Message\ResponseInterface;

class IndexController
{

    public function index(): ResponseInterface
    {

        $stream = new Stream();
        $stream->write('<div>first</div>');

        $response = new Response();
        $response->withBody($stream);

        return $response;
    }

    public function second()
    {
        $stream = new Stream();
        $stream->write('<div>second</div>');

        $response = new Response();
        $response->withBody($stream);

        return $response;
    }

}