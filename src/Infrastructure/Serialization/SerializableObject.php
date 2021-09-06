<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Serialization;

use RuntimeException;

abstract class SerializableObject
{
    /**
     * @return string
     * @throws RuntimeException
     */
    public function serialize(): string
    {
        return Serializer::getInstance()->serialize($this, 'json');
    }
}
