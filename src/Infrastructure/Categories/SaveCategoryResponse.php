<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Categories;

use YNAB\Infrastructure\Serialization\DeserializableObject;

/**
 * @extends DeserializableObject<SaveCategoryResponse>
 */
class SaveCategoryResponse extends DeserializableObject implements SaveCategoryResponseInterface
{
    private SaveCategoryResponseData $data;

    /**
     * @return SaveCategoryResponseData
     */
    public function getData(): SaveCategoryResponseData
    {
        return $this->data;
    }

    /**
     * @param SaveCategoryResponseData $data
     * @return SaveCategoryResponse
     */
    public function setData(SaveCategoryResponseData $data): SaveCategoryResponse
    {
        $this->data = $data;
        return $this;
    }
}
