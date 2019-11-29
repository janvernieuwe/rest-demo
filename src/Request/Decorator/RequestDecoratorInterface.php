<?php declare(strict_types=1);

namespace Phpro\RestDemo\Request\Decorator;

use Psr\Http\Message\RequestInterface;

interface RequestDecoratorInterface
{
    public function decorateRequest(RequestInterface $request): RequestInterface;
}
