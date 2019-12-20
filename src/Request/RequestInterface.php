<?php declare(strict_types=1);

namespace Phpro\RestDemo\Request;

interface RequestInterface
{
    /**
     * The request verb
     * @internal
     */
    public function getMethod(): string;

    /**
     * Path of the request
     * @internal
     */
    public function getPath(): string;

    /**
     * Additional parameters
     * @internal
     */
    public function getParameters(): array;
}
