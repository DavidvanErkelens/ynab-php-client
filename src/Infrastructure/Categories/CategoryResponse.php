<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Categories;

use YNAB\Infrastructure\Serialization\DeserializableObject;

/**
 * @extends DeserializableObject<CategoryResponse>
 */
class CategoryResponse extends DeserializableObject implements CategoryResponseInterface
{
    private CategoryResponseData $data;

    /**
     * @return CategoryResponseData
     */
    public function getData(): CategoryResponseData
    {
        return $this->data;
    }

    /**
     * @param CategoryResponseData $data
     * @return CategoryResponse
     */
    public function setData(CategoryResponseData $data): CategoryResponse
    {
        $this->data = $data;
        return $this;
    }
}
