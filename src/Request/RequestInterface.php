<?php declare(strict_types=1);

namespace Phpro\RestDemo\Request;

interface RequestInterface
{
    /**
     * The request verb
     */
    public function getMethod(): string;

    /**
     * Path of the request
     */
    public function getPath(): string;

    /**
     * Additional parameters
     */
    public function getParameters(): array;
}
