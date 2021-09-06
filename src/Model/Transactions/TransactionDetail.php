<?php

declare(strict_types=1);

namespace YNAB\Model\Transactions;

class TransactionDetail extends TransactionSummary implements TransactionDetailInterface
{
    private string $accountName;
    private ?string $payeeName;
    private ?string $categoryName;

    /** @var SubTransaction[] */
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
     * @return TransactionDetail
     */
    public function setAccountName(string $accountName): TransactionDetail
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
     * @return TransactionDetail
     */
    public function setPayeeName(?string $payeeName): TransactionDetail
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
     * @return TransactionDetail
     */
    public function setCategoryName(?string $categoryName): TransactionDetail
    {
        $this->categoryName = $categoryName;
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
     * @return TransactionDetail
     */
    public function setSubtransactions(array $subtransactions): TransactionDetail
    {
        $this->subtransactions = $subtransactions;
        return $this;
    }
}
