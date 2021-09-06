<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Categories;

use YNAB\Model\Categories\CategoryGroupWithCategories;

class CategoriesResponseData implements CategoriesResponseDataInterface
{
    /** @var CategoryGroupWithCategories[] */
    private array $categoryGroups;

    /**
     * @return CategoryGroupWithCategories[]
     */
    public function getCategoryGroups(): array
    {
        return $this->categoryGroups;
    }

    /**
     * @param CategoryGroupWithCategories[] $categoryGroups
     * @return CategoriesResponseData
     */
    public function setCategoryGroups(array $categoryGroups): CategoriesResponseData
    {
        $this->categoryGroups = $categoryGroups;
        return $this;
    }
}
