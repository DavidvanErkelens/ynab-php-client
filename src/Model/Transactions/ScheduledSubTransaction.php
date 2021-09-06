<?php

declare(strict_types=1);

namespace YNAB\Model\Transactions;

class ScheduledSubTransaction implements ScheduledSubTransactionInterface
{
    private string $id;
    private string $scheduledTransactionId;
    private int $amount;
    private ?string $memo;
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
     * @param string $id
     * @return ScheduledSubTransaction
     */
    public function setId(string $id): ScheduledSubTransaction
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getScheduledTransactionId(): string
    {
        return $this->scheduledTransactionId;
    }

    /**
     * @param string $scheduledTransactionId
     * @return ScheduledSubTransaction
     */
    public function setScheduledTransactionId(string $scheduledTransactionId): ScheduledSubTransaction
    {
        $this->scheduledTransactionId = $scheduledTransactionId;
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
     * @return ScheduledSubTransaction
     */
    public function setAmount(int $amount): ScheduledSubTransaction
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
     * @return ScheduledSubTransaction
     */
    public function setMemo(?string $memo): ScheduledSubTransaction
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
     * @return ScheduledSubTransaction
     */
    public function setPayeeId(?string $payeeId): ScheduledSubTransaction
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
     * @return ScheduledSubTransaction
     */
    public function setCategoryId(?string $categoryId): ScheduledSubTransaction
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
     * @return ScheduledSubTransaction
     */
    public function setTransferAccountId(?string $transferAccountId): ScheduledSubTransaction
    {
        $this->transferAccountId = $transferAccountId;
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
     * @return ScheduledSubTransaction
     */
    public function setDeleted(bool $deleted): ScheduledSubTransaction
    {
        $this->deleted = $deleted;
        return $this;
    }
}
