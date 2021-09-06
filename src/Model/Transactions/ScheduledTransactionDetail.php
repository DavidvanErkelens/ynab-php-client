<?php

declare(strict_types=1);

namespace YNAB\Model\Transactions;

class ScheduledTransactionDetail extends ScheduledTransactionSummary implements ScheduledTransactionDetailInterface
{
    private string $accountName;
    private ?string $payeeName;
    private ?string $categoryName;

    /** @var ScheduledSubTransaction[] */
    private array $subtransactions;

    /**
     * @return string
     */
    public function getAccountName(): string
    {
        return $this->accountName;
    }

    /**
     * @param string $accountName
     * @return ScheduledTransactionDetail
     */
    public function setAccountName(string $accountName): ScheduledTransactionDetail
    {
        $this->accountName = $accountName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPayeeName(): ?string
    {
        return $this->payeeName;
    }

    /**
     * @param string|null $payeeName
     * @return ScheduledTransactionDetail
     */
    public function setPayeeName(?string $payeeName): ScheduledTransactionDetail
    {
        $this->payeeName = $payeeName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCategoryName(): ?string
    {
        return $this->categoryName;
    }

    /**
     * @param string|null $categoryName
     * @return ScheduledTransactionDetail
     */
    public function setCategoryName(?string $categoryName): ScheduledTransactionDetail
    {
        $this->categoryName = $categoryName;
        return $this;
    }

    /**
     * @return ScheduledSubTransaction[]
     */
    public function getSubtransactions(): array
    {
        return $this->subtransactions;
    }

    /**
     * @param ScheduledSubTransaction[] $subtransactions
     * @return ScheduledTransactionDetail
     */
    public function setSubtransactions(array $subtransactions): ScheduledTransactionDetail
    {
        $this->subtransactions = $subtransactions;
        return $this;
    }
}
