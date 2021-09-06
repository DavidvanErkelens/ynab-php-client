<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Serialization;

use RuntimeException;
use Symfony\Component\Serializer\Exception\ExtraAttributesException;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use YNAB\Exceptions\DeserializationException;

/**
 * @template T
 */
abstract class DeserializableObject
{
    /**
     * @return T
     * @throws RuntimeException
     * @throws DeserializationException
     */
    public static function deserialize(string $data): self
    {
        try {
            return Serializer::getInstance()->deserialize($data, get_called_class(), 'json', [
                AbstractNormalizer::ALLOW_EXTRA_ATTRIBUTES => false,
            ]);
        } catch (ExtraAttributesException | NotEncodableValueException $exception) {
            throw new DeserializationException($data, get_called_class(), $exception);
        }
    }
}
