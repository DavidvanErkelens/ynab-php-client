<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Http;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;

class UrlBuilder implements UrlBuilderInterface
{
    public function buildUri(
        string $path,
        array $pathParams = [],
        array $queryParams = []
    ): UriInterface {
        if (!empty($pathParams)) {
            $path = sprintf($path, ...$pathParams);
        }

        $queryParams = array_filter($queryParams, fn ($value) => $value !== null);

        return Uri::withQueryValues(new Uri($path), $queryParams);
    }
}
