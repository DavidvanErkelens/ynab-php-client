<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Categories;

use YNAB\Infrastructure\Serialization\SerializableObject;
use YNAB\Model\Categories\SaveMonthCategory;

class SaveMonthCategoryWrapper extends SerializableObject
{
    private SaveMonthCategory $category;

    /**
     * @param SaveMonthCategory $category
     */
    private function __construct(SaveMonthCategory $category)
    {
        $this->category = $category;
    }

    /**
     * @param SaveMonthCategory $category
     * @return SaveMonthCategoryWrapper
     */
    public static function wrap(SaveMonthCategory $category): SaveMonthCategoryWrapper
    {
        return new self($category);
    }

    /**
     * @return SaveMonthCategory
     */
    public function getCategory(): SaveMonthCategory
    {
        return $this->category;
    }

    /**
     * @param SaveMonthCategory $category
     * @return SaveMonthCategoryWrapper
     */
    public function setCategory(SaveMonthCategory $category): SaveMonthCategoryWrapper
    {
        $this->category = $category;
        return $this;
    }
}
