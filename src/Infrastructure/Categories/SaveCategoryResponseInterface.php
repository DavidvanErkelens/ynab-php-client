<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Categories;

interface SaveCategoryResponseInterface
{
    /**
     * @return SaveCategoryResponseData
     */
    public function getData(): SaveCategoryResponseData;
}
