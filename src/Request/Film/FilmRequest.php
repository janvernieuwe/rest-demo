<?php declare(strict_types=1);

namespace Phpro\RestDemo\Request\Film;

use Nyholm\Psr7\Request;
use Phpro\RestDemo\Request\AbstractRequest;

class FilmRequest extends AbstractRequest
{
    public static function byId(int $id): self
    {
        $instance = new self();
        $instance->request = new Request('GET', sprintf('%s%s', '/api/films/', $id));

        return $instance;
    }
}
