<?php

declare(strict_types=1);

namespace YNAB\Exceptions;

use RuntimeException;
use Throwable;

class DeserializationException extends RuntimeException
{
    private string $sourceData;
    private string $targetClass;

    public function __construct(string $sourceData, string $targetClass, Throwable $previous)
    {
        $exceptionMessage = "The provided data could not be deserialized into the requested class ($targetClass)";
        parent::__construct($exceptionMessage, 0, $previous);

        $this->sourceData = $sourceData;
        $this->targetClass = $targetClass;
    }

    /**
     * @return string
     */
    public function getSourceData(): string
    {
        return $this->sourceData;
    }

    /**
     * @return string
     */
    public function getTargetClass(): string
    {
        return $this->targetClass;
    }
}
