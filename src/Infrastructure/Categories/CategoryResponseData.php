<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Categories;

use YNAB\Model\Categories\Category;

class CategoryResponseData implements CategoryResponseDataInterface
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
     * @return CategoryResponseData
     */
    public function setCategory(Category $category): CategoryResponseData
    {
        $this->category = $category;
        return $this;
    }
}
