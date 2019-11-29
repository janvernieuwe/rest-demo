<?php declare(strict_types=1);

namespace Phpro\RestDemo\Serializer;

use Psr\Http\Message\ResponseInterface;

interface ResponseSerializerInterface
{
    public function convertResponse(ResponseInterface $response, string $class);
}
