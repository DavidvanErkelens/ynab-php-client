<?php

namespace YNAB\Model\Budgets;

use YNAB\Model\Categories\Category;
use YNAB\Model\Categories\CategoryGroup;
use YNAB\Model\Months\MonthDetail;
use YNAB\Model\Payees\Payee;
use YNAB\Model\Payees\PayeeLocation;
use YNAB\Model\Transactions\ScheduledSubTransaction;
use YNAB\Model\Transactions\ScheduledTransactionSummary;
use YNAB\Model\Transactions\SubTransaction;
use YNAB\Model\Transactions\TransactionSummary;

class BudgetDetail extends BudgetSummary implements BudgetDetailInterface
{
    /** @var Payee[] */
    private array $payees;

    /** @var PayeeLocation[] */
    private array $payeeLocations;

    /** @var CategoryGroup[] */
    private array $categoryGroups;

    /** @var Category[] */
    private array $categories;

    /** @var MonthDetail[]  */
    private array $months;

    /** @var TransactionSummary[] */
    private array $transactions;

    /** @var SubTransaction[] */
    private array $subtransactions;

    /** @var ScheduledTransactionSummary[] */
    private array $scheduledTransactions;

    /** @var ScheduledSubTransaction[] */
    private array $scheduledSubtransactions;

    /**
     * @return Payee[]
     */
    public function getPayees(): array
    {
        return $this->payees;
    }

    /**
     * @param Payee[] $payees
     * @return BudgetDetail
     */
    public function setPayees(array $payees): BudgetDetail
    {
        $this->payees = $payees;
        return $this;
    }

    /**
     * @return PayeeLocation[]
     */
    public function getPayeeLocations(): array
    {
        return $this->payeeLocations;
    }

    /**
     * @param PayeeLocation[] $payeeLocations
     * @return BudgetDetail
     */
    public function setPayeeLocations(array $payeeLocations): BudgetDetail
    {
        $this->payeeLocations = $payeeLocations;
        return $this;
    }

    /**
     * @return CategoryGroup[]
     */
    public function getCategoryGroups(): array
    {
        return $this->categoryGroups;
    }

    /**
     * @param CategoryGroup[] $categoryGroups
     * @return BudgetDetail
     */
    public function setCategoryGroups(array $categoryGroups): BudgetDetail
    {
        $this->categoryGroups = $categoryGroups;
        return $this;
    }

    /**
     * @return Category[]
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * @param Category[] $categories
     * @return BudgetDetail
     */
    public function setCategories(array $categories): BudgetDetail
    {
        $this->categories = $categories;
        return $this;
    }

    /**
     * @return MonthDetail[]
     */
    public function getMonths(): array
    {
        return $this->months;
    }

    /**
     * @param MonthDetail[] $months
     * @return BudgetDetail
     */
    public function setMonths(array $months): BudgetDetail
    {
        $this->months = $months;
        return $this;
    }

    /**
     * @return TransactionSummary[]
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }

    /**
     * @param TransactionSummary[] $transactions
     * @return BudgetDetail
     */
    public function setTransactions(array $transactions): BudgetDetail
    {
        $this->transactions = $transactions;
        return $this;
    }

    /**
     * @return SubTransaction[]
     */
    public function getSubtransactions(): array
    {
        return $this->subtransactions;
    }

    /**
     * @param SubTransaction[] $subtransactions
     * @return BudgetDetail
     */
    public function setSubtransactions(array $subtransactions): BudgetDetail
    {
        $this->subtransactions = $subtransactions;
        return $this;
    }

    /**
     * @return ScheduledTransactionSummary[]
     */
    public function getScheduledTransactions(): array
    {
        return $this->scheduledTransactions;
    }

    /**
     * @param ScheduledTransactionSummary[] $scheduledTransactions
     * @return BudgetDetail
     */
    public function setScheduledTransactions(array $scheduledTransactions): BudgetDetail
    {
        $this->scheduledTransactions = $scheduledTransactions;
        return $this;
    }

    /**
     * @return ScheduledSubTransaction[]
     */
    public function getScheduledSubtransactions(): array
    {
        return $this->scheduledSubtransactions;
    }

    /**
     * @param ScheduledSubTransaction[] $scheduledSubtransactions
     * @return BudgetDetail
     */
    public function setScheduledSubtransactions(array $scheduledSubtransactions): BudgetDetail
    {
        $this->scheduledSubtransactions = $scheduledSubtransactions;
        return $this;
    }
}
