<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Http;

use Psr\Http\Message\UriInterface;

interface UrlBuilderInterface
{
    public function buildUri(string $path, array $pathParams = [], array $queryParams = []): UriInterface;
}
