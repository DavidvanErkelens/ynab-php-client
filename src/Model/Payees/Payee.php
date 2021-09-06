<?php

declare(strict_types=1);

namespace YNAB\Model\Payees;

class Payee implements PayeeInterface
{
    private string $id;
    private string $name;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return ?string
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
     * @return Payee
     */
    public function setId(string $id): Payee
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $name
     * @return Payee
     */
    public function setName(string $name): Payee
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param ?string $transferAccountId
     * @return Payee
     */
    public function setTransferAccountId(?string $transferAccountId): Payee
    {
        $this->transferAccountId = $transferAccountId;
        return $this;
    }

    /**
     * @param bool $deleted
     * @return Payee
     */
    public function setDeleted(bool $deleted): Payee
    {
        $this->deleted = $deleted;
        return $this;
    }
}
