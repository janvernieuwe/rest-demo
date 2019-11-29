<?php declare(strict_types=1);

namespace Phpro\RestDemo;

use Nyholm\Psr7\Request;
use Phpro\RestDemo\Serializer\JmsSerializer;
use Phpro\RestDemo\Serializer\ResponseSerializerInterface;
use Phpro\RestDemo\Type\Film;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;

class StarwarsClient
{
    private const BASE_URI = 'https://swapi.co';
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
    public function getFilm(int $filmId): Film
    {
        $request = new Request('GET', sprintf('%s%s%s', self::BASE_URI, '/api/films/', $filmId));
        $response = $this->client->sendRequest($request);
        return $this->responseSerializer->convertResponse($response, Film::class);
    }
}
