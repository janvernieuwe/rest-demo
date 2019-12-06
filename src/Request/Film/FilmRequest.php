<?php declare(strict_types=1);

namespace Phpro\RestDemo\Request\Film;

use Phpro\RestDemo\Request\RequestInterface;

class FilmRequest implements RequestInterface
{
    private int $id;

    public function withId(int $id): self
    {
        $this->id = $id;
        $instance = new static();
        $instance->id = $id;

        return $instance;
    }

    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return 'GET';
    }

    /**
     * @inheritDoc
     */
    public function getPath(): string
    {
        return sprintf('%s%s', '/api/films/', $this->id);
    }

    /**
     * @inheritDoc
     */
    public function getParameters(): array
    {
        return [];
    }
}
