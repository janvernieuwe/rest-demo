<?php declare(strict_types=1);

namespace Phpro\RestDemo;

use Phpro\RestDemo\Request\AbstractRequest;
use Phpro\RestDemo\Request\Film\FilmRequest;
use Phpro\RestDemo\Request\Film\SearchFilmRequest;
use Phpro\RestDemo\Serializer\JmsSerializer;
use Phpro\RestDemo\Serializer\ResponseSerializerInterface;
use Phpro\RestDemo\Type;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;

class StarwarsClient
{
    private ClientInterface $client;
    private ResponseSerializerInterface $responseSerializer;

    public function __construct(
        ClientInterface $client,
        ResponseSerializerInterface $responseSerializer = null
    ) {
        $this->client = $client;
        $this->responseSerializer = $responseSerializer ?? JmsSerializer::create();
    }

    /**
     * @throws ClientExceptionInterface
     */
    private function request(AbstractRequest $abstractRequest, string $type)
    {
        $request = $abstractRequest->toRequest();
        // $request = $request->withAddedHeader(); // you can add auth here
        $response = $this->client->sendRequest($request);

        return $this->responseSerializer->convertResponse($response, $type);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getFilm(FilmRequest $filmRequest): Type\Film\Film
    {
        return $this->request($filmRequest, Type\Film\Film::class);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function searchFilms(SearchFilmRequest $searchRequest): Type\Film\FilmSearchResponse
    {
        return $this->request($searchRequest, Type\Film\FilmSearchResponse::class);
    }
}
