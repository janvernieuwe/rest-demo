<?php declare(strict_types=1);

namespace Phpro\RestDemo;

use Phpro\RestDemo\Request\Film\FilmRequest;
use Phpro\RestDemo\Request\Film\SearchFilmRequest;
use Phpro\RestDemo\Transport\BasicTransport;
use Phpro\RestDemo\Transport\TransportInterface;
use Phpro\RestDemo\Type;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;

class StarwarsClient
{
    private TransportInterface $transport;

    public function __construct(TransportInterface $transport)
    {
        $this->transport = $transport;
    }

    public static function create(ClientInterface $client): self
    {
        return new self(BasicTransport::create($client));
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getFilm(FilmRequest $filmRequest): Type\Film\Film
    {
        return $this->transport->request($filmRequest, Type\Film\Film::class);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function searchFilms(SearchFilmRequest $searchRequest): Type\Film\FilmSearchResponse
    {
        return $this->transport->request($searchRequest, Type\Film\FilmSearchResponse::class);
    }
}
