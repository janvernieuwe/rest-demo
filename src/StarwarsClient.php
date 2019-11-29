<?php declare(strict_types=1);

namespace Phpro\RestDemo;

use Phpro\RestDemo\Request\FilmRequest;
use Phpro\RestDemo\Serializer\JmsSerializer;
use Phpro\RestDemo\Serializer\ResponseSerializerInterface;
use Phpro\RestDemo\Type;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;

class StarwarsClient
{
    private ClientInterface $client;
    private ResponseSerializerInterface $responseSerializer;

    public function __construct(ClientInterface $client, ResponseSerializerInterface $responseSerializer = null)
    {
        $this->client = $client;
        $this->responseSerializer = $responseSerializer ?? JmsSerializer::create();
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getFilm(FilmRequest $filmRequest): Type\Film
    {
        $response = $this->client->sendRequest($filmRequest->toRequest());
        return $this->responseSerializer->convertResponse($response, Type\Film::class);
    }
}
