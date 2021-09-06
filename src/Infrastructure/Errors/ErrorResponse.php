<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Errors;

use YNAB\Infrastructure\Serialization\DeserializableObject;
use YNAB\Model\Errors\ErrorDetail;

/**
 * @extends DeserializableObject<ErrorResponse>
 */
class ErrorResponse extends DeserializableObject implements ErrorResponseInterface
{
    private ErrorDetail $error;

    /**
     * @return ErrorDetail
     */
    public function getError(): ErrorDetail
    {
        return $this->error;
    }

    /**
     * @param ErrorDetail $error
     * @return ErrorResponse
     */
    public function setError(ErrorDetail $error): ErrorResponse
    {
        $this->error = $error;
        return $this;
    }
}
