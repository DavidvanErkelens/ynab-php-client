<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Categories;

use YNAB\Model\Categories\Category;

class SaveCategoryResponseData implements SaveCategoryResponseDataInterface
{
    private Category $category;

    /**
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     * @return SaveCategoryResponseData
     */
    public function setCategory(Category $category): SaveCategoryResponseData
    {
        $this->category = $category;
        return $this;
    }
}
