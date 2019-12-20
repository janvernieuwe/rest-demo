<?php

namespace Phpro\RestDemo\Test\Unit;

use GuzzleHttp\Client;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use Phpro\RestDemo\Request\Film\FilmRequest;
use Phpro\RestDemo\Request\Film\SearchFilmRequest;
use Phpro\RestDemo\Request\RequestFactory;
use Phpro\RestDemo\Serializer\JmsSerializer;
use Phpro\RestDemo\Transport\BasicTransport;
use PHPUnit\Framework\TestCase;
use Phpro\RestDemo\StarwarsClient;
use Psr\Http\Client\ClientExceptionInterface;

class StarwarsClientTest extends TestCase
{
    private StarwarsClient $client;

    public function setUp(): void
    {
        $guzzle = new Client(['base_uri' => 'https://swapi.co']);
        $httpClient = new GuzzleAdapter($guzzle);
        $serializer = JmsSerializer::create(__DIR__.'/../../vendor/autoload.php');
        $transport = new BasicTransport($httpClient, $serializer, new RequestFactory());
        $this->client = new StarwarsClient($transport);
    }

    /**
     * @todo add php-vcr when its compatible with sf5 / php7.4
     * @throws ClientExceptionInterface
     */
    public function testGetFilm()
    {
        $film = $this->client->getFilm(FilmRequest::withId(1));
        self::assertNotNull($film);
    }


    /**
     * @todo add php-vcr when its compatible with sf5 / php7.4
     * @throws ClientExceptionInterface
     */
    public function testSearchFilm()
    {
        $films = $this->client->searchFilms(SearchFilmRequest::withTitle('return'));
        self::assertEquals(1, $films->getCount());
        self::assertEquals('Return of the Jedi', $films->getResults()[0]->getTitle());
    }
}
