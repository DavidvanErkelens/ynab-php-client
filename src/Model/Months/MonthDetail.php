<?php

declare(strict_types=1);

namespace YNAB\Model\Months;

use YNAB\Model\Categories\Category;

class MonthDetail extends MonthSummary implements MonthDetailInterface
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
     * @return MonthDetail
     */
    public function setCategories(array $categories): MonthDetail
    {
        $this->categories = $categories;
        return $this;
    }
}
