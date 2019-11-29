<?php declare(strict_types=1);

namespace Phpro\RestDemo\Request;

use Nyholm\Psr7\Request;

abstract class AbstractRequest
{
    protected Request $request;

    protected function __construct()
    {
    }

    public function toRequest(): Request
    {
        return clone $this->request;
    }
}
