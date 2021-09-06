<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Categories;

interface CategoriesResponseInterface
{
    /**
     * @return CategoriesResponseDataInterface
     */
    public function getData(): CategoriesResponseDataInterface;
}
