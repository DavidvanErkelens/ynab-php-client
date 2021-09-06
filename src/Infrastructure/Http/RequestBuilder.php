<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Http;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

class RequestBuilder implements RequestBuilderInterface
{
    public function buildGetRequest(UriInterface $uri): RequestInterface
    {
        return new Request('GET', $uri);
    }

    public function buildPostRequest(UriInterface $uri, ?string $body = null): RequestInterface
    {
        return new Request('POST', $uri, [
            'Content-Type' => 'application/json'
        ], $body);
    }

    public function buildPatchRequest(UriInterface $uri, ?string $body = null): RequestInterface
    {
        return new Request('PATCH', $uri, [
            'Content-Type' => 'application/json'
        ], $body);
    }

    public function buildPutRequest(UriInterface $uri, ?string $body = null): RequestInterface
    {
        return new Request('PUT', $uri, [
            'Content-Type' => 'application/json'
        ], $body);
    }
}
