<?php declare(strict_types=1);

namespace Phpro\RestDemo\Transport;

use Phpro\RestDemo\Request\RequestFactory;
use Phpro\RestDemo\Request\RequestInterface;
use Phpro\RestDemo\Serializer\JmsSerializer;
use Phpro\RestDemo\Serializer\ResponseSerializerInterface;
use Psr\Http\Client\ClientInterface;

class BasicTransport implements TransportInterface
{
    private ClientInterface $client;
    private ResponseSerializerInterface $responseSerializer;
    private RequestFactory $requestFactory;

    public function __construct(
        ClientInterface $client,
        ResponseSerializerInterface $responseSerializer,
        RequestFactory $requestFactory
    ) {
        $this->client = $client;
        $this->responseSerializer = $responseSerializer;
        $this->requestFactory = $requestFactory;
    }

    public static function create(ClientInterface $client): self
    {
        return new self(
            $client,
            JmsSerializer::create(),
            new RequestFactory()
        );
    }

    /**
     * @inheritDoc
     */
    public function request(RequestInterface $requestInterface, string $type)
    {
        $request = $this->requestFactory->createRequest($requestInterface);
        $response = $this->client->sendRequest($request);

        return $this->responseSerializer->convertResponse($response, $type);
    }
}
