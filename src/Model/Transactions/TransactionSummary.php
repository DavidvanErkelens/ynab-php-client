<?php

declare(strict_types=1);

namespace YNAB\Model\Transactions;

class TransactionSummary implements TransactionSummaryInterface
{
    private string $id;
    private string $date;
    private int $amount;
    private ?string $memo;
    private string $cleared;
    private bool $approved;
    private ?string $flagColor;
    private string $accountId;
    private ?string $payeeId;
    private ?string $categoryId;
    private ?string $transferAccountId;
    private ?string $transferTransactionId;
    private ?string $matchedTransactionId;
    private ?string $importId;
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
     * @return TransactionSummary
     */
    public function setId(string $id): TransactionSummary
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @return TransactionSummary
     */
    public function setDate(string $date): TransactionSummary
    {
        $this->date = $date;
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
     * @return TransactionSummary
     */
    public function setAmount(int $amount): TransactionSummary
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
     * @return TransactionSummary
     */
    public function setMemo(?string $memo): TransactionSummary
    {
        $this->memo = $memo;
        return $this;
    }

    /**
     * @return string
     */
    public function getCleared(): string
    {
        return $this->cleared;
    }

    /**
     * @param string $cleared
     * @return TransactionSummary
     */
    public function setCleared(string $cleared): TransactionSummary
    {
        $this->cleared = $cleared;
        return $this;
    }

    /**
     * @return bool
     */
    public function isApproved(): bool
    {
        return $this->approved;
    }

    /**
     * @param bool $approved
     * @return TransactionSummary
     */
    public function setApproved(bool $approved): TransactionSummary
    {
        $this->approved = $approved;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFlagColor(): ?string
    {
        return $this->flagColor;
    }

    /**
     * @param string|null $flagColor
     * @return TransactionSummary
     */
    public function setFlagColor(?string $flagColor): TransactionSummary
    {
        $this->flagColor = $flagColor;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }

    /**
     * @param string $accountId
     * @return TransactionSummary
     */
    public function setAccountId(string $accountId): TransactionSummary
    {
        $this->accountId = $accountId;
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
     * @return TransactionSummary
     */
    public function setPayeeId(?string $payeeId): TransactionSummary
    {
        $this->payeeId = $payeeId;
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
     * @return TransactionSummary
     */
    public function setCategoryId(?string $categoryId): TransactionSummary
    {
        $this->categoryId = $categoryId;
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
     * @return TransactionSummary
     */
    public function setTransferAccountId(?string $transferAccountId): TransactionSummary
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
     * @return TransactionSummary
     */
    public function setTransferTransactionId(?string $transferTransactionId): TransactionSummary
    {
        $this->transferTransactionId = $transferTransactionId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMatchedTransactionId(): ?string
    {
        return $this->matchedTransactionId;
    }

    /**
     * @param string|null $matchedTransactionId
     * @return TransactionSummary
     */
    public function setMatchedTransactionId(?string $matchedTransactionId): TransactionSummary
    {
        $this->matchedTransactionId = $matchedTransactionId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getImportId(): ?string
    {
        return $this->importId;
    }

    /**
     * @param string|null $importId
     * @return TransactionSummary
     */
    public function setImportId(?string $importId): TransactionSummary
    {
        $this->importId = $importId;
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
     * @return TransactionSummary
     */
    public function setDeleted(bool $deleted): TransactionSummary
    {
        $this->deleted = $deleted;
        return $this;
    }
}
