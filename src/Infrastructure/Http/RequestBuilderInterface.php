<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Http;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

interface RequestBuilderInterface
{
    public function buildGetRequest(UriInterface $uri): RequestInterface;
    public function buildPostRequest(UriInterface $uri, ?string $body = null): RequestInterface;
    public function buildPatchRequest(UriInterface $uri, ?string $body = null): RequestInterface;
    public function buildPutRequest(UriInterface $uri, ?string $body = null): RequestInterface;
}
