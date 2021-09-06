<?php

declare(strict_types=1);

namespace YNAB\Model\Transactions;

class ScheduledTransactionSummary implements ScheduledTransactionSummaryInterface
{
    private string $id;
    private string $dateFirst;
    private string $dateNext;
    private string $frequency;
    private int $amount;
    private ?string $memo;
    private ?string $flagColor;
    private string $accountId;
    private ?string $payeeId;
    private ?string $categoryId;
    private ?string $transferAccountId;
    private bool $deleted;

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
    public function getDateFirst(): string
    {
        return $this->dateFirst;
    }

    /**
     * @return string
     */
    public function getDateNext(): string
    {
        return $this->dateNext;
    }

    /**
     * @return string
     */
    public function getFrequency(): string
    {
        return $this->frequency;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return string|null
     */
    public function getMemo(): ?string
    {
        return $this->memo;
    }

    /**
     * @return string|null
     */
    public function getFlagColor(): ?string
    {
        return $this->flagColor;
    }

    /**
     * @return string
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }

    /**
     * @return string|null
     */
    public function getPayeeId(): ?string
    {
        return $this->payeeId;
    }

    /**
     * @return string|null
     */
    public function getCategoryId(): ?string
    {
        return $this->categoryId;
    }

    /**
     * @return string|null
     */
    public function getTransferAccountId(): ?string
    {
        return $this->transferAccountId;
    }

    /**
     * @return bool
     */
    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    /**
     * @param string $id
     * @return ScheduledTransactionSummary
     */
    public function setId(string $id): ScheduledTransactionSummary
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $dateFirst
     * @return ScheduledTransactionSummary
     */
    public function setDateFirst(string $dateFirst): ScheduledTransactionSummary
    {
        $this->dateFirst = $dateFirst;
        return $this;
    }

    /**
     * @param string $dateNext
     * @return ScheduledTransactionSummary
     */
    public function setDateNext(string $dateNext): ScheduledTransactionSummary
    {
        $this->dateNext = $dateNext;
        return $this;
    }

    /**
     * @param string $frequency
     * @return ScheduledTransactionSummary
     */
    public function setFrequency(string $frequency): ScheduledTransactionSummary
    {
        $this->frequency = $frequency;
        return $this;
    }

    /**
     * @param int $amount
     * @return ScheduledTransactionSummary
     */
    public function setAmount(int $amount): ScheduledTransactionSummary
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @param string|null $memo
     * @return ScheduledTransactionSummary
     */
    public function setMemo(?string $memo): ScheduledTransactionSummary
    {
        $this->memo = $memo;
        return $this;
    }

    /**
     * @param string|null $flagColor
     * @return ScheduledTransactionSummary
     */
    public function setFlagColor(?string $flagColor): ScheduledTransactionSummary
    {
        $this->flagColor = $flagColor;
        return $this;
    }

    /**
     * @param string $accountId
     * @return ScheduledTransactionSummary
     */
    public function setAccountId(string $accountId): ScheduledTransactionSummary
    {
        $this->accountId = $accountId;
        return $this;
    }

    /**
     * @param string|null $payeeId
     * @return ScheduledTransactionSummary
     */
    public function setPayeeId(?string $payeeId): ScheduledTransactionSummary
    {
        $this->payeeId = $payeeId;
        return $this;
    }

    /**
     * @param string|null $categoryId
     * @return ScheduledTransactionSummary
     */
    public function setCategoryId(?string $categoryId): ScheduledTransactionSummary
    {
        $this->categoryId = $categoryId;
        return $this;
    }

    /**
     * @param string|null $transferAccountId
     * @return ScheduledTransactionSummary
     */
    public function setTransferAccountId(?string $transferAccountId): ScheduledTransactionSummary
    {
        $this->transferAccountId = $transferAccountId;
        return $this;
    }

    /**
     * @param bool $deleted
     * @return ScheduledTransactionSummary
     */
    public function setDeleted(bool $deleted): ScheduledTransactionSummary
    {
        $this->deleted = $deleted;
        return $this;
    }
}
