<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Categories;

use YNAB\Model\Categories\CategoryGroupWithCategoriesInterface;

interface CategoriesResponseDataInterface
{
    /**
     * @return CategoryGroupWithCategoriesInterface[]
     */
    public function getCategoryGroups(): array;
}
