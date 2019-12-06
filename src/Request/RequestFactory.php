<?php declare(strict_types=1);

namespace Phpro\RestDemo\Request;

use Nyholm\Psr7\Request;
use Nyholm\Psr7\Uri;

class RequestFactory
{
    /**
     * @inheritDoc
     */
    public function createRequest(RequestInterface $request): Request
    {
        $uri = new Uri();
        $uri = $uri->withPath($request->getPath());
        $uri = $uri->withQuery(http_build_query($request->getParameters()));

        return new Request($request->getMethod(), $uri);
    }
}
