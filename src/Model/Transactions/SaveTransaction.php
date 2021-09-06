<?php

declare(strict_types=1);

namespace YNAB\Model\Transactions;

use DateTime;
use YNAB\Infrastructure\Serialization\SerializableObject;

class SaveTransaction extends SerializableObject
{
    private string $accountId;

    /**
     * The transaction date in ISO format (e.g. 2016-12-01). Future dates (scheduled transactions) are not permitted.
     * Split transaction dates cannot be changed and if a different date is supplied it will be ignored.
     */
    private DateTime $date;

    /**
     * The transaction amount in milliunits format. Split transaction amounts cannot be changed and if a different
     * amount is supplied it will be ignored.
     */
    private int $amount;

    /**
     * The payee for the transaction. To create a transfer between two accounts, use the account transfer payee pointing
     * to the target account. Account transfer payees are specified as tranfer_payee_id on the account resource.
     */
    private ?string $payeeId;

    /**
     * The payee name. If a payee_name value is provided and payee_id has a null value, the payee_name value will be
     * used to resolve the payee by either (1) a matching payee rename rule (only if import_id is also specified)
     * or (2) a payee with the same name or (3) creation of a new payee.
     */
    private ?string $payeeName;

    /**
     * The category for the transaction. To configure a split transaction, you can specify null for category_id and
     * provide a subtransactions array as part of the transaction object. If an existing transaction is a split, the
     * category_id cannot be changed. Credit Card Payment categories are not permitted and will be ignored if supplied.
     */
    private ?string $categoryId;
    private ?string $memo;

    /**
     * The cleared status of the transaction
     * [ cleared, uncleared, reconciled ]
     */
    private ?string $cleared;

    /**
     * Whether or not the transaction is approved. If not supplied, transaction will be unapproved by default.
     */
    private bool $approved;

    /**
     * The transaction flag
     * [ red, orange, yellow, green, blue, purple, ]
     */
    private ?string $flagColor;

    /**
     * If specified, the new transaction will be assigned this import_id and considered "imported". We will also attempt
     * to match this imported transaction to an existing “user-entered” transation on the same account, with the same
     * amount, and with a date +/-10 days from the imported transaction date.
     *
     * Transactions imported through File Based Import or Direct Import (not through the API) are assigned an import_id
     * in the format: 'YNAB:[milliunit_amount]:[iso_date]:[occurrence]'. For example, a transaction dated 2015-12-30
     * in the amount of -$294.23 USD would have an import_id of 'YNAB:-294230:2015-12-30:1’. If a second transaction on
     * the same account was imported and had the same date and same amount, its import_id would be
     * 'YNAB:-294230:2015-12-30:2’. Using a consistent format will prevent duplicates through Direct Import and
     * File Based Import.
     *
     * If import_id is omitted or specified as null, the transaction will be treated as a “user-entered” transaction.
     * As such, it will be eligible to be matched against transactions later being imported (via DI, FBI, or API).
     */
    private ?string $importId;

    /**
     * An array of subtransactions to configure a transaction as a split. Updating subtransactions on an existing
     * split transaction is not supported.
     * @var SaveSubTransaction[]
     */
    private array $subtransactions;

    public function __construct(
        string   $accountId,
        DateTime $date,
        int      $amount,
        ?string  $payeeId = null,
        ?string  $payeeName = null,
        ?string  $categoryId = null,
        ?string  $memo = null,
        ?string  $cleared = null,
        bool     $approved = false,
        ?string  $flagColor = null,
        ?string  $importId = null,
        array    $subtransactions = []
    ) {
        $this->accountId = $accountId;
        $this->date = $date;
        $this->amount = $amount;
        $this->payeeId = $payeeId;
        $this->payeeName = $payeeName;
        $this->categoryId = $categoryId;
        $this->memo = $memo;
        $this->cleared = $cleared;
        $this->approved = $approved;
        $this->flagColor = $flagColor;
        $this->importId = $importId;
        $this->subtransactions = $subtransactions;
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
     * @return SaveTransaction
     */
    public function setAccountId(string $accountId): SaveTransaction
    {
        $this->accountId = $accountId;
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
     * @return SaveTransaction
     */
    public function setDate(DateTime $date): SaveTransaction
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
     * @return SaveTransaction
     */
    public function setAmount(int $amount): SaveTransaction
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
     * @return SaveTransaction
     */
    public function setPayeeId(?string $payeeId): SaveTransaction
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
     * @return SaveTransaction
     */
    public function setPayeeName(?string $payeeName): SaveTransaction
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
     * @return SaveTransaction
     */
    public function setCategoryId(?string $categoryId): SaveTransaction
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
     * @return SaveTransaction
     */
    public function setMemo(?string $memo): SaveTransaction
    {
        $this->memo = $memo;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCleared(): ?string
    {
        return $this->cleared;
    }

    /**
     * @param string|null $cleared
     * @return SaveTransaction
     */
    public function setCleared(?string $cleared): SaveTransaction
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
     * @return SaveTransaction
     */
    public function setApproved(bool $approved): SaveTransaction
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
     * @return SaveTransaction
     */
    public function setFlagColor(?string $flagColor): SaveTransaction
    {
        $this->flagColor = $flagColor;
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
     * @return SaveTransaction
     */
    public function setImportId(?string $importId): SaveTransaction
    {
        $this->importId = $importId;
        return $this;
    }

    /**
     * @return SaveSubTransaction[]
     */
    public function getSubtransactions(): array
    {
        return $this->subtransactions;
    }

    /**
     * @param SaveSubTransaction[] $subtransactions
     * @return SaveTransaction
     */
    public function setSubtransactions(array $subtransactions): SaveTransaction
    {
        $this->subtransactions = $subtransactions;
        return $this;
    }
}
