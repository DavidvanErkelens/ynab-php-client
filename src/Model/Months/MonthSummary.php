<?php

declare(strict_types=1);

namespace YNAB\Model\Months;

class MonthSummary
{
    private string $month;
    private ?string $note;
    private int $income;
    private int $budgeted;
    private int $activity;
    private int $toBeBudgeted;
    private ?int $ageOfMoney;
    private bool $deleted;

    /**
     * @return string
     */
    public function getMonth(): string
    {
        return $this->month;
    }

    /**
     * @param string $month
     * @return MonthSummary
     */
    public function setMonth(string $month): MonthSummary
    {
        $this->month = $month;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string|null $note
     * @return MonthSummary
     */
    public function setNote(?string $note): MonthSummary
    {
        $this->note = $note;
        return $this;
    }

    /**
     * @return int
     */
    public function getIncome(): int
    {
        return $this->income;
    }

    /**
     * @param int $income
     * @return MonthSummary
     */
    public function setIncome(int $income): MonthSummary
    {
        $this->income = $income;
        return $this;
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
     * @return MonthSummary
     */
    public function setBudgeted(int $budgeted): MonthSummary
    {
        $this->budgeted = $budgeted;
        return $this;
    }

    /**
     * @return int
     */
    public function getActivity(): int
    {
        return $this->activity;
    }

    /**
     * @param int $activity
     * @return MonthSummary
     */
    public function setActivity(int $activity): MonthSummary
    {
        $this->activity = $activity;
        return $this;
    }

    /**
     * @return int
     */
    public function getToBeBudgeted(): int
    {
        return $this->toBeBudgeted;
    }

    /**
     * @param int $toBeBudgeted
     * @return MonthSummary
     */
    public function setToBeBudgeted(int $toBeBudgeted): MonthSummary
    {
        $this->toBeBudgeted = $toBeBudgeted;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAgeOfMoney(): ?int
    {
        return $this->ageOfMoney;
    }

    /**
     * @param int|null $ageOfMoney
     * @return MonthSummary
     */
    public function setAgeOfMoney(?int $ageOfMoney): MonthSummary
    {
        $this->ageOfMoney = $ageOfMoney;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    /**
     * @param bool $deleted
     * @return MonthSummary
     */
    public function setDeleted(bool $deleted): MonthSummary
    {
        $this->deleted = $deleted;
        return $this;
    }
}
