<?php

declare(strict_types=1);

namespace YNAB\Model\Transactions;

use DateTime;

class HybridTransaction implements HybridTransactionInterface
{
    private string $id;
    private DateTime $date;
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
    private string $type;
    private ?string $parentTransactionId;
    private string $accountName;
    private ?string $payeeName;
    private ?string $categoryName;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return HybridTransaction
     */
    public function setId(string $id): HybridTransaction
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     * @return HybridTransaction
     */
    public function setDate(DateTime $date): HybridTransaction
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
     * @return HybridTransaction
     */
    public function setAmount(int $amount): HybridTransaction
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
     * @return HybridTransaction
     */
    public function setMemo(?string $memo): HybridTransaction
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
     * @return HybridTransaction
     */
    public function setCleared(string $cleared): HybridTransaction
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
     * @return HybridTransaction
     */
    public function setApproved(bool $approved): HybridTransaction
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
     * @return HybridTransaction
     */
    public function setFlagColor(?string $flagColor): HybridTransaction
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
     * @return HybridTransaction
     */
    public function setAccountId(string $accountId): HybridTransaction
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
     * @return HybridTransaction
     */
    public function setPayeeId(?string $payeeId): HybridTransaction
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
     * @return HybridTransaction
     */
    public function setCategoryId(?string $categoryId): HybridTransaction
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
     * @return HybridTransaction
     */
    public function setTransferAccountId(?string $transferAccountId): HybridTransaction
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
     * @return HybridTransaction
     */
    public function setTransferTransactionId(?string $transferTransactionId): HybridTransaction
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
     * @return HybridTransaction
     */
    public function setMatchedTransactionId(?string $matchedTransactionId): HybridTransaction
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
     * @return HybridTransaction
     */
    public function setImportId(?string $importId): HybridTransaction
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
     * @return HybridTransaction
     */
    public function setDeleted(bool $deleted): HybridTransaction
    {
        $this->deleted = $deleted;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return HybridTransaction
     */
    public function setType(string $type): HybridTransaction
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getParentTransactionId(): ?string
    {
        return $this->parentTransactionId;
    }

    /**
     * @param string|null $parentTransactionId
     * @return HybridTransaction
     */
    public function setParentTransactionId(?string $parentTransactionId): HybridTransaction
    {
        $this->parentTransactionId = $parentTransactionId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountName(): string
    {
        return $this->accountName;
    }

    /**
     * @param string $accountName
     * @return HybridTransaction
     */
    public function setAccountName(string $accountName): HybridTransaction
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
     * @return HybridTransaction
     */
    public function setPayeeName(?string $payeeName): HybridTransaction
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
     * @return HybridTransaction
     */
    public function setCategoryName(?string $categoryName): HybridTransaction
    {
        $this->categoryName = $categoryName;
        return $this;
    }
}
