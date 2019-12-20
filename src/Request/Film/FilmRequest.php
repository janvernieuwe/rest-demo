<?php declare(strict_types=1);

namespace Phpro\RestDemo\Request\Film;

use Phpro\RestDemo\Request\RequestInterface;

class FilmRequest implements RequestInterface
{
    private int $id;

    private function __construct()
    {
    }

    public static function withId(int $id): self
    {
        $instance = new self();
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
