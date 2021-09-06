<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Categories;

interface CategoryResponseInterface
{
    /**
     * @return CategoryResponseDataInterface
     */
    public function getData(): CategoryResponseDataInterface;
}
