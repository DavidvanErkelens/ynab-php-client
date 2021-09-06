<?php

declare(strict_types=1);

namespace YNAB\Model\Transactions;

use YNAB\Infrastructure\Serialization\SerializableObject;

class SaveSubTransaction extends SerializableObject
{
    /**
     * The subtransaction amount in milliunits format.
     */
    private int $amount;

    /**
     * The payee for the subtransaction.
     */
    private ?string $payeeId;

    /**
     * The payee name. If a payee_name value is provided and payee_id has a null value, the payee_name value will be
     * used to resolve the payee by either (1) a matching payee rename rule (only if import_id is also specified on
     * parent transaction) or (2) a payee with the same name or (3) creation of a new payee.
     */
    private ?string $payeeName;

    /**
     * The category for the subtransaction. Credit Card Payment categories are not permitted and will be ignored if
     * supplied.
     */
    private ?string $categoryId;
    private ?string $memo;

    public function __construct(
        int     $amount,
        ?string $payeeId = null,
        ?string $payeeName = null,
        ?string $categoryId = null,
        ?string $memo = null
    ) {
        $this->amount = $amount;
        $this->payeeId = $payeeId;
        $this->payeeName = $payeeName;
        $this->categoryId = $categoryId;
        $this->memo = $memo;
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
     * @return SaveSubTransaction
     */
    public function setAmount(int $amount): SaveSubTransaction
    {
        $this->amount = $amount;
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
     * @return SaveSubTransaction
     */
    public function setPayeeId(?string $payeeId): SaveSubTransaction
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
     * @return SaveSubTransaction
     */
    public function setPayeeName(?string $payeeName): SaveSubTransaction
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
     * @return SaveSubTransaction
     */
    public function setCategoryId(?string $categoryId): SaveSubTransaction
    {
        $this->categoryId = $categoryId;
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
     * @return SaveSubTransaction
     */
    public function setMemo(?string $memo): SaveSubTransaction
    {
        $this->memo = $memo;
        return $this;
    }
}
