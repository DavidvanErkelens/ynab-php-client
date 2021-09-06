<?php

declare(strict_types=1);

namespace YNAB\Model\Categories;

class SaveMonthCategory
{
    /**
     * Budgeted amount in milliunits format
     * @var int
     */
    private int $budgeted;

    public function __construct(int $budgeted)
    {
        $this->budgeted = $budgeted;
    }

    /**
     * @return int
     */
    public function getBudgeted(): int
    {
        return $this->budgeted;
    }

    /**
     * @param int $budgeted
     * @return SaveMonthCategory
     */
    public function setBudgeted(int $budgeted): SaveMonthCategory
    {
        $this->budgeted = $budgeted;
        return $this;
    }
}
