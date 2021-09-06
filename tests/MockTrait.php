<?php

declare(strict_types=1);

namespace YNAB\Tests;

use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Prophet;

trait MockTrait
{
    private static ?Prophet $prophet;

    private function mock(string $class): ObjectProphecy
    {
        if (!isset(self::$prophet)) {
            self::$prophet = new Prophet();
        }

        return self::$prophet->prophesize($class);
    }
}