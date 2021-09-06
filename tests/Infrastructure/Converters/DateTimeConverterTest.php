<?php

declare(strict_types=1);

namespace YNAB\Tests\Infrastructure\Converters;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use YNAB\Infrastructure\Converters\DateTimeConverter;

class DateTimeConverterTest extends TestCase
{
    private DateTimeConverter $sut;

    public function setUp(): void
    {
        $this->sut = new DateTimeConverter();
    }

    public function testConverterParsesIsoDate(): void
    {
        $date = "2021-09-12T08:32:00Z";

        $result = $this->sut->parseIso8601($date);

        $this->assertEquals(2021, $result->format('Y'));
        $this->assertEquals(9, $result->format('m'));
        $this->assertEquals(12, $result->format('d'));
        $this->assertEquals(8, $result->format('H'));
        $this->assertEquals(32, $result->format('i'));
        $this->assertEquals(0, $result->format('s'));
    }

    public function testConverterThrowsIfDateIsInvalid(): void
    {
        $input = "not ISO";
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage("Could not parse '$input', not in ISO-8601 format");

        $this->sut->parseIso8601($input);
    }
}