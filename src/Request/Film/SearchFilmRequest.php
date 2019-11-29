<?php declare(strict_types=1);

namespace Phpro\RestDemo\Request\Film;

use Nyholm\Psr7\Request;
use Phpro\RestDemo\Request\AbstractRequest;

class SearchFilmRequest extends AbstractRequest
{
    public static function byTitle(string $title): self
    {
        $instance = new self();
        $instance->request = new Request('GET', sprintf('%s%s?search=%s', self::BASE_URI, '/api/films', $title));

        return $instance;
    }
}
