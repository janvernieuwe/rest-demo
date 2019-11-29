<?php declare(strict_types=1);

namespace Phpro\RestDemo\Request\Decorator;

use Psr\Http\Message\RequestInterface;

class RequestRequestDecorator implements RequestDecoratorInterface
{
    private string $host;
    private string $scheme;

    public function __construct(string $host, string $scheme = 'https')
    {
        $this->host = $host;
        $this->scheme = $scheme;
    }

    public function decorateRequest(RequestInterface $request): RequestInterface
    {
        // You could add auth to the request here...
        $uri = $request->getUri();
        $uri = $uri->withScheme($this->scheme);
        $uri = $uri->withHost($this->host);

        return $request->withUri($uri);
    }
}
