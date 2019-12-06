<?php declare(strict_types=1);

namespace Phpro\RestDemo\Request\Film;

use Phpro\RestDemo\Request\RequestInterface;

class SearchFilmRequest implements RequestInterface
{
    private string $title;

    public function withTitle(string $title): self
    {
        $instance = new static();
        $instance->title = $title;

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
        return '/api/films';
    }

    /**
     * @inheritDoc
     */
    public function getParameters(): array
    {
        return ['search' => $this->title];
    }
}
