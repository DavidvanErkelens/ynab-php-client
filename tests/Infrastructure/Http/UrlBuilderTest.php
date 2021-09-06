<?php

declare(strict_types=1);

namespace YNAB\Tests\Infrastructure\Http;

use PHPUnit\Framework\TestCase;
use YNAB\Infrastructure\Http\UrlBuilder;

class UrlBuilderTest extends TestCase
{
    private const BASE_URL = 'https://www.example.com';

    private UrlBuilder $sut;

    public function setUp(): void
    {
        $this->sut = new UrlBuilder();
    }

    public function testCreateUrlBuildsUriObject(): void
    {
        $result = $this->sut->buildUri(self::BASE_URL);

        $this->assertEquals(self::BASE_URL, (string) $result);
    }

    public function testCreateUrlAddsQueryParameters(): void
    {
        $result = $this->sut->buildUri(self::BASE_URL, [], [
            'one' => 1,
            'two' => 2
        ]);

        $expectedUrl = self::BASE_URL . '?one=1&two=2';
        $this->assertEquals($expectedUrl, (string) $result);
    }

    public function testCreateUrlSkipsNullQueryParams(): void
    {
        $result = $this->sut->buildUri(self::BASE_URL, [], [
            'one' => null,
            'two' => 2
        ]);

        $expectedUrl = self::BASE_URL . '?two=2';
        $this->assertEquals($expectedUrl, (string) $result);
    }

    public function testCreateUrlReplacesPlaceholdersInPath(): void
    {
        $url = self::BASE_URL . '/%s/%d';

        $result = $this->sut->buildUri($url, ['abc', 123]);

        $expectedUrl = self::BASE_URL . '/abc/123';
        $this->assertEquals($expectedUrl, (string) $result);
    }
}