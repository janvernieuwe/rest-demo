<?php declare(strict_types=1);

namespace Phpro\RestDemo\Type\Film;

use JMS\Serializer\Annotation as JMS;

class FilmSearchResponse
{
    /**
     * @JMS\Type("int")
     */
    private int $count;

    /**
     * @JMS\Type("string")
     */
    private ?string $next;

    /**
     * @JMS\Type("string")
     */
    private ?string $previous;

    /**
     * @var Film[]
     * @JMS\Type("array<Phpro\RestDemo\Type\Film\Film>")
     */
    private $results;

    public function getCount(): int
    {
        return $this->count;
    }

    public function getNext(): ?string
    {
        return $this->next;
    }

    public function getPrevious(): ?string
    {
        return $this->previous;
    }

    /**
     * @return Film[]
     */
    public function getResults(): array
    {
        return $this->results;
    }
}
