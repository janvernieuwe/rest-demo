<?php declare(strict_types=1);

namespace Phpro\RestDemo;

use Phpro\RestDemo\Serializer\JmsSerializer;
use Phpro\RestDemo\Serializer\ResponseSerializerInterface;
use Psr\Http\Client\ClientInterface;

class StarwarsClient
{
    private ClientInterface $client;
    private ResponseSerializerInterface $responseSerializer;

    public function __construct(ClientInterface $client, ?ResponseSerializerInterface $responseSerializer)
    {
        $this->client = $client;
        $this->responseSerializer = $responseSerializer ?? JmsSerializer::create();
    }
}
