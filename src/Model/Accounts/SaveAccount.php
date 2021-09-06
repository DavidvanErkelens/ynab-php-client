<?php

declare(strict_types=1);

namespace YNAB\Model\Accounts;

class SaveAccount
{
    /**
     * The name of the account
     * @var string
     */
    private string $name;

    /**
     * The account type
     * [ checking, savings, creditCard, cash, lineOfCredit, otherAsset, otherLiability ]
     * @var string
     */
    private string $type;

    /**
     * The current balance of the account in milliunits format
     * @var int
     */
    private int $balance;

    public function __construct(string $name, string $type, int $balance)
    {
        $this->name = $name;
        $this->type = $type;
        $this->balance = $balance;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return SaveAccount
     */
    public function setName(string $name): SaveAccount
    {
        $this->name = $name;
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
     * @return SaveAccount
     */
    public function setType(string $type): SaveAccount
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getBalance(): int
    {
        return $this->balance;
    }

    /**
     * @param int $balance
     * @return SaveAccount
     */
    public function setBalance(int $balance): SaveAccount
    {
        $this->balance = $balance;
        return $this;
    }
}
