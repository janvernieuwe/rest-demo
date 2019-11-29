<?php declare(strict_types=1);

namespace Phpro\RestDemo\Request;

use Nyholm\Psr7\Request;

class FilmRequest extends AbstractRequest
{
    private function __construct()
    {
    }

    public static function byId(int $id): self
    {
        $instance = new self();
        $instance->request = new Request('GET', sprintf('%s%s%s', self::BASE_URI, '/api/films/', $id));

        return $instance;
    }
}
