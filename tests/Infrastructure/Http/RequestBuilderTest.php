<?php

declare(strict_types=1);

namespace YNAB\Tests\Infrastructure\Http;

use GuzzleHttp\Psr7\Uri;
use PHPUnit\Framework\TestCase;
use YNAB\Infrastructure\Http\RequestBuilder;

class RequestBuilderTest extends TestCase
{
    private const REQUEST_URL = 'https://www.example.com/a?q=1';

    private RequestBuilder $sut;

    public function setUp(): void
    {
        $this->sut = new RequestBuilder();
    }

    public function testBuildGetRequestReturnsValidRequest(): void
    {
        $result = $this->sut->buildGetRequest(new Uri(self::REQUEST_URL));

        $this->assertEquals(self::REQUEST_URL, $result->getUri());
        $this->assertEquals('GET', $result->getMethod());
    }
}