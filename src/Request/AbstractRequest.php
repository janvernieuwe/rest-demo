<?php declare(strict_types=1);

namespace Phpro\RestDemo\Request;

use Nyholm\Psr7\Request;

abstract class AbstractRequest
{
    protected const BASE_URI = 'https://swapi.co';
    protected Request $request;

    public function toRequest(): Request
    {
        return clone $this->request;
    }
}
