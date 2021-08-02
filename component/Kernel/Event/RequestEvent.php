<?php
declare(strict_types=1);

namespace Component\Kernel\Event;

use Component\Http\Response;

class RequestEvent extends KernelEvent
{

    private $response;

    public function getResponse()
    {
        return $this->response;
    }

    public function setResponse(Response $response)
    {
        $this->response = $response;
    }

    public function hasResponse()
    {
        return $this->response !== null;
    }

}