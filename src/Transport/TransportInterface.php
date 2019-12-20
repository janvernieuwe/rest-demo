<?php declare(strict_types=1);

namespace Phpro\RestDemo\Transport;

use Phpro\RestDemo\Request\RequestInterface;
use Psr\Http\Client\ClientExceptionInterface;

interface TransportInterface
{
    /**
     * @throws ClientExceptionInterface
     */
    public function request(RequestInterface $requestInterface, string $type);
}
