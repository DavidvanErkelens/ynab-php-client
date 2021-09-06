<?php

declare(strict_types=1);

namespace YNAB\Model\Accounts;

class Account implements AccountInterface
{
    private string $id;
    private string $name;
    private string $type;
    private bool $onBudget;
    private bool $closed;
    private ?string $note;
    private int $balance;
    private int $clearedBalance;
    private int $unclearedBalance;
    private string $transferPayeeId;
    private bool $directImportLinked;
    private bool $directImportInError;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return bool
     */
    public function isOnBudget(): bool
    {
        return $this->onBudget;
    }

    /**
     * @return bool
     */
    public function isClosed(): bool
    {
        return $this->closed;
    }

    /**
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @return int
     */
    public function getBalance(): int
    {
        return $this->balance;
    }

    /**
     * @return int
     */
    public function getClearedBalance(): int
    {
        return $this->clearedBalance;
    }

    /**
     * @return int
     */
    public function getUnclearedBalance(): int
    {
        return $this->unclearedBalance;
    }

    /**
     * @return string
     */
    public function getTransferPayeeId(): string
    {
        return $this->transferPayeeId;
    }

    /**
     * @return bool
     */
    public function isDirectImportLinked(): bool
    {
        return $this->directImportLinked;
    }

    /**
     * @return bool
     */
    public function isDirectImportInError(): bool
    {
        return $this->directImportInError;
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
     * @return Account
     */
    public function setId(string $id): Account
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $name
     * @return Account
     */
    public function setName(string $name): Account
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $type
     * @return Account
     */
    public function setType(string $type): Account
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param bool $onBudget
     * @return Account
     */
    public function setOnBudget(bool $onBudget): Account
    {
        $this->onBudget = $onBudget;
        return $this;
    }

    /**
     * @param bool $closed
     * @return Account
     */
    public function setClosed(bool $closed): Account
    {
        $this->closed = $closed;
        return $this;
    }

    /**
     * @param string|null $note
     * @return Account
     */
    public function setNote(?string $note): Account
    {
        $this->note = $note;
        return $this;
    }

    /**
     * @param int $balance
     * @return Account
     */
    public function setBalance(int $balance): Account
    {
        $this->balance = $balance;
        return $this;
    }

    /**
     * @param int $clearedBalance
     * @return Account
     */
    public function setClearedBalance(int $clearedBalance): Account
    {
        $this->clearedBalance = $clearedBalance;
        return $this;
    }

    /**
     * @param int $unclearedBalance
     * @return Account
     */
    public function setUnclearedBalance(int $unclearedBalance): Account
    {
        $this->unclearedBalance = $unclearedBalance;
        return $this;
    }

    /**
     * @param string $transferPayeeId
     * @return Account
     */
    public function setTransferPayeeId(string $transferPayeeId): Account
    {
        $this->transferPayeeId = $transferPayeeId;
        return $this;
    }

    /**
     * @param bool $directImportLinked
     * @return Account
     */
    public function setDirectImportLinked(bool $directImportLinked): Account
    {
        $this->directImportLinked = $directImportLinked;
        return $this;
    }

    /**
     * @param bool $directImportInError
     * @return Account
     */
    public function setDirectImportInError(bool $directImportInError): Account
    {
        $this->directImportInError = $directImportInError;
        return $this;
    }

    /**
     * @param bool $deleted
     * @return Account
     */
    public function setDeleted(bool $deleted): Account
    {
        $this->deleted = $deleted;
        return $this;
    }
}
