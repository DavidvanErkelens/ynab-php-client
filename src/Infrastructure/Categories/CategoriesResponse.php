<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Categories;

use YNAB\Infrastructure\Serialization\DeserializableObject;

/**
 * @extends DeserializableObject<CategoriesResponse>
 */
class CategoriesResponse extends DeserializableObject implements CategoriesResponseInterface
{
    private CategoriesResponseData $data;

    /**
     * @return CategoriesResponseData
     */
    public function getData(): CategoriesResponseData
    {
        return $this->data;
    }

    /**
     * @param CategoriesResponseData $data
     * @return CategoriesResponse
     */
    public function setData(CategoriesResponseData $data): CategoriesResponse
    {
        $this->data = $data;
        return $this;
    }
}
