<?php

declare(strict_types=1);

namespace YNAB\Model\Categories;

interface CategoryGroupWithCategoriesInterface extends CategoryGroupInterface
{
    /**
     * @return Category[]
     */
    public function getCategories(): array;
}
