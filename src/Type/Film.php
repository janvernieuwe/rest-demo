<?php declare(strict_types=1);

namespace Phpro\RestDemo\Type;

use JMS\Serializer\Annotation as JMS;

class Film
{
    /**
     * @JMS\Type("string")
     */
    private string $title;

    /**
     * @JMS\Type("int")
     * @JMS\SerializedName("episode_id")
     */
    private int $episodeId;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("opening_crawl")
     */
    private string $openingCrawl;

    /**
     * @JMS\Type("string")
     */
    private string $director;

    /**
     * @JMS\Type("string")
     */
    private string $producer;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("release_date")
     */
    private string $releaseDate;

    /**
     * @var string[]
     * @JMS\Type("array")
     */
    private array $characters;

    /**
     * @var string[]
     * @JMS\Type("array")
     */
    private array $planets;

    /**
     * @var string[]
     * @JMS\Type("array")
     */
    private array $starships;

    /**
     * @var string[]
     * @JMS\Type("array")
     */
    private array $vehicles;

    /**
     * @var string[]
     * @JMS\Type("array")
     */
    private array $species;

    /**
     * @JMS\Type("string")
     */
    private string $created;

    /**
     * @JMS\Type("string")
     */
    private string $edited;

    /**
     * @JMS\Type("string")
     */
    private string $url;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getEpisodeId(): int
    {
        return $this->episodeId;
    }

    public function getOpeningCrawl(): string
    {
        return $this->openingCrawl;
    }

    public function getDirector(): string
    {
        return $this->director;
    }

    public function getProducer(): string
    {
        return $this->producer;
    }

    public function getReleaseDate(): string
    {
        return $this->releaseDate;
    }

    public function getCharacters(): array
    {
        return $this->characters;
    }

    public function getPlanets(): array
    {
        return $this->planets;
    }

    public function getStarships(): array
    {
        return $this->starships;
    }

    public function getVehicles(): array
    {
        return $this->vehicles;
    }

    public function getSpecies(): array
    {
        return $this->species;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function getEdited(): string
    {
        return $this->edited;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}
