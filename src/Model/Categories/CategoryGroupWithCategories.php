<?php

declare(strict_types=1);

namespace YNAB\Model\Categories;

class CategoryGroupWithCategories extends CategoryGroup implements CategoryGroupWithCategoriesInterface
{
    /** @var Category[] */
    private array $categories;

    /**
     * @return Category[]
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * @param Category[] $categories
     * @return CategoryGroupWithCategories
     */
    public function setCategories(array $categories): CategoryGroupWithCategories
    {
        $this->categories = $categories;
        return $this;
    }
}
