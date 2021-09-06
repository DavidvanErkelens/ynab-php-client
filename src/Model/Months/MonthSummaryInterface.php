<?php

declare(strict_types=1);

namespace YNAB\Model\Months;

interface MonthSummaryInterface
{
    /**
     * @return string
     */
    public function getMonth(): string;

    /**
     * @return string|null
     */
    public function getNote(): ?string;

    /**
     * The total amount of transactions categorized to ‘Inflow: Ready to Assign’ in the month
     * @return int
     */
    public function getIncome(): int;

    /**
     * The total amount budgeted in the month
     * @return int
     */
    public function getBudgeted(): int;

    /**
     * The total amount of transactions in the month, excluding those categorized to ‘Inflow: Ready to Assign’
     * @return int
     */
    public function getActivity(): int;

    /**
     * The available amount for ‘Ready to Assign’
     * @return int
     */
    public function getToBeBudgeted(): int;

    /**
     * The Age of Money as of the month
     * @return int|null
     */
    public function getAgeOfMoney(): ?int;

    /**
     * Whether or not the month has been deleted. Deleted months will only be included in delta requests.
     * @return bool
     */
    public function isDeleted(): bool;
}
