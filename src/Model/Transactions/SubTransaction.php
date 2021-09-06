<?php

declare(strict_types=1);

namespace YNAB\Model\Transactions;

class SubTransaction implements SubTransactionInterface
{
    private string $id;
    private string $transactionId;
    private int $amount;
    private ?string $memo;
    private ?string $payeeId;
    private ?string $payeeName;
    private ?string $categoryId;
    private ?string $categoryName;
    private ?string $transferAccountId;
    private ?string $transferTransactionId;
    private bool $deleted;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return SubTransaction
     */
    public function setId(string $id): SubTransaction
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     * @return SubTransaction
     */
    public function setTransactionId(string $transactionId): SubTransaction
    {
        $this->transactionId = $transactionId;
        return $this;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     * @return SubTransaction
     */
    public function setAmount(int $amount): SubTransaction
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMemo(): ?string
    {
        return $this->memo;
    }

    /**
     * @param string|null $memo
     * @return SubTransaction
     */
    public function setMemo(?string $memo): SubTransaction
    {
        $this->memo = $memo;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPayeeId(): ?string
    {
        return $this->payeeId;
    }

    /**
     * @param string|null $payeeId
     * @return SubTransaction
     */
    public function setPayeeId(?string $payeeId): SubTransaction
    {
        $this->payeeId = $payeeId;
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
     * @return SubTransaction
     */
    public function setPayeeName(?string $payeeName): SubTransaction
    {
        $this->payeeName = $payeeName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCategoryId(): ?string
    {
        return $this->categoryId;
    }

    /**
     * @param string|null $categoryId
     * @return SubTransaction
     */
    public function setCategoryId(?string $categoryId): SubTransaction
    {
        $this->categoryId = $categoryId;
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
     * @return SubTransaction
     */
    public function setCategoryName(?string $categoryName): SubTransaction
    {
        $this->categoryName = $categoryName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTransferAccountId(): ?string
    {
        return $this->transferAccountId;
    }

    /**
     * @param string|null $transferAccountId
     * @return SubTransaction
     */
    public function setTransferAccountId(?string $transferAccountId): SubTransaction
    {
        $this->transferAccountId = $transferAccountId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTransferTransactionId(): ?string
    {
        return $this->transferTransactionId;
    }

    /**
     * @param string|null $transferTransactionId
     * @return SubTransaction
     */
    public function setTransferTransactionId(?string $transferTransactionId): SubTransaction
    {
        $this->transferTransactionId = $transferTransactionId;
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
     * @return SubTransaction
     */
    public function setDeleted(bool $deleted): SubTransaction
    {
        $this->deleted = $deleted;
        return $this;
    }
}
