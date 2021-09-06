<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Categories;

use YNAB\Model\Categories\CategoryInterface;

interface CategoryResponseDataInterface
{
    /**
     * @return CategoryInterface
     */
    public function getCategory(): CategoryInterface;
}
