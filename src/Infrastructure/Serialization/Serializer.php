<?php

namespace YNAB\Infrastructure\Serialization;

use Doctrine\Common\Annotations\AnnotationException;
use Doctrine\Common\Annotations\AnnotationReader;
use RuntimeException;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer as BaseSerializer;

class Serializer
{
    private static ?BaseSerializer $instance;

    /**
     * @return BaseSerializer
     * @throws RuntimeException
     */
    public static function getInstance(): BaseSerializer
    {
        if (!isset(self::$instance)) {
            try {
                $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
            } catch (AnnotationException $exception) {
                throw new RuntimeException("Serializer cannot be constructed", 0, $exception);
            }

            $normalizers = [
                new DateTimeNormalizer(),
                new ArrayDenormalizer(),
                new ObjectNormalizer(
                    $classMetadataFactory,
                    new CamelCaseToSnakeCaseNameConverter(),
                    null,
                    new PhpDocExtractor()
                ),
            ];

            self::$instance = new BaseSerializer($normalizers, [new JsonEncoder()]);
        }

        return self::$instance;
    }
}
