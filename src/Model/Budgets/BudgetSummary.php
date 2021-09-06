<?php

declare(strict_types=1);

namespace YNAB\Model\Budgets;

use DateTime;
use YNAB\Model\Accounts\Account;
use YNAB\Model\Shared\CurrencyFormat;
use YNAB\Model\Shared\DateFormat;

class BudgetSummary implements BudgetSummaryInterface
{
    protected string $id;
    protected string $name;
    protected DateTime $lastModifiedOn;
    protected string $firstMonth;
    protected string $lastMonth;
    protected DateFormat $dateFormat;
    protected CurrencyFormat $currencyFormat;

    /**
     * @var Account[]
     */
    protected array $accounts;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return DateTime
     */
    public function getLastModifiedOn(): DateTime
    {
        return $this->lastModifiedOn;
    }

    /**
     * @return string
     */
    public function getFirstMonth(): string
    {
        return $this->firstMonth;
    }

    /**
     * @return string
     */
    public function getLastMonth(): string
    {
        return $this->lastMonth;
    }

    /**
     * @return DateFormat
     */
    public function getDateFormat(): DateFormat
    {
        return $this->dateFormat;
    }

    /**
     * @return CurrencyFormat
     */
    public function getCurrencyFormat(): CurrencyFormat
    {
        return $this->currencyFormat;
    }

    /**
     * @return Account[]
     */
    public function getAccounts(): array
    {
        return $this->accounts;
    }

    /**
     * @param string $id
     * @return BudgetSummary
     */
    public function setId(string $id): BudgetSummary
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $name
     * @return BudgetSummary
     */
    public function setName(string $name): BudgetSummary
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param DateTime $lastModifiedOn
     * @return BudgetSummary
     */
    public function setLastModifiedOn(DateTime $lastModifiedOn): BudgetSummary
    {
        $this->lastModifiedOn = $lastModifiedOn;
        return $this;
    }

    /**
     * @param string $firstMonth
     * @return BudgetSummary
     */
    public function setFirstMonth(string $firstMonth): BudgetSummary
    {
        $this->firstMonth = $firstMonth;
        return $this;
    }

    /**
     * @param string $lastMonth
     * @return BudgetSummary
     */
    public function setLastMonth(string $lastMonth): BudgetSummary
    {
        $this->lastMonth = $lastMonth;
        return $this;
    }

    /**
     * @param DateFormat $dateFormat
     * @return BudgetSummary
     */
    public function setDateFormat(DateFormat $dateFormat): BudgetSummary
    {
        $this->dateFormat = $dateFormat;
        return $this;
    }

    /**
     * @param CurrencyFormat $currencyFormat
     * @return BudgetSummary
     */
    public function setCurrencyFormat(CurrencyFormat $currencyFormat): BudgetSummary
    {
        $this->currencyFormat = $currencyFormat;
        return $this;
    }

    /**
     * @param Account[] $accounts
     * @return BudgetSummary
     */
    public function setAccounts(array $accounts): BudgetSummary
    {
        $this->accounts = $accounts;
        return $this;
    }
}
