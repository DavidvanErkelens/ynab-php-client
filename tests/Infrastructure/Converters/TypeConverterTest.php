<?php

declare(strict_types=1);

namespace YNAB\Tests\Infrastructure\Converters;

use PHPUnit\Framework\TestCase;
use YNAB\Infrastructure\Converters\TypeConverter;

class TypeConverterTest extends TestCase
{
    private TypeConverter $sut;

    public function setUp(): void
    {
        $this->sut = new TypeConverter();
    }

    public function testBoolToStringMapsCorrectValues(): void
    {
        $this->assertEquals('true', $this->sut->boolToString(true));
        $this->assertEquals('false', $this->sut->boolToString(false));
    }
}