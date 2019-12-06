<?php declare(strict_types=1);

namespace Phpro\RestDemo;

use Phpro\RestDemo\Request\Film\FilmRequest;
use Phpro\RestDemo\Request\Film\SearchFilmRequest;
use Phpro\RestDemo\Request\RequestFactory;
use Phpro\RestDemo\Request\RequestInterface;
use Phpro\RestDemo\Serializer\JmsSerializer;
use Phpro\RestDemo\Serializer\ResponseSerializerInterface;
use Phpro\RestDemo\Type;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;

class StarwarsClient
{
    private ClientInterface $client;
    private ResponseSerializerInterface $responseSerializer;
    private RequestFactory $requestFactory;

    public function __construct(
        ClientInterface $client,
        ResponseSerializerInterface $responseSerializer = null
    ) {
        $this->client = $client;
        $this->responseSerializer = $responseSerializer ?? JmsSerializer::create();
        $this->requestFactory = new RequestFactory();
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
    private function request(RequestInterface $requestInterface, string $type)
    {
        $request = $this->requestFactory->createRequest($requestInterface);
        $response = $this->client->sendRequest($request);

        return $this->responseSerializer->convertResponse($response, $type);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function searchFilms(SearchFilmRequest $searchRequest): Type\Film\FilmSearchResponse
    {
        return $this->request($searchRequest, Type\Film\FilmSearchResponse::class);
    }
}
