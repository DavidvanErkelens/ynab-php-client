<?php

declare(strict_types=1);

namespace YNAB\Model\Transactions;

interface TransactionSummaryInterface
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * The transaction date in ISO format (e.g. 2016-12-01)
     * @return string
     */
    public function getDate(): string;

    /**
     * The transaction amount in milliunits format
     * @return int
     */
    public function getAmount(): int;

    /**
     * @return string|null
     */
    public function getMemo(): ?string;

    /**
     * The cleared status of the transaction (cleared, uncleared, reconciled)
     * @return string
     */
    public function getCleared(): string;

    /**
     * Whether or not the transaction is approved
     * @return bool
     */
    public function isApproved(): bool;

    /**
     * The transaction flag (red, orange, yellow, green, blue, purple, )
     * @return string|null
     */
    public function getFlagColor(): ?string;

    /**
     * @return string
     */
    public function getAccountId(): string;

    /**
     * @return string|null
     */
    public function getPayeeId(): ?string;

    /**
     * @return string|null
     */
    public function getCategoryId(): ?string;

    /**
     * If a transfer transaction, the account to which it transfers
     * @return string|null
     */
    public function getTransferAccountId(): ?string;

    /**
     * If a transfer transaction, the id of transaction on the other side of the transfer
     * @return string|null
     */
    public function getTransferTransactionId(): ?string;

    /**
     * If transaction is matched, the id of the matched transaction
     * @return string|null
     */
    public function getMatchedTransactionId(): ?string;

    /**
     * If the Transaction was imported, this field is a unique (by account) import identifier. If this transaction was
     * imported through File Based Import or Direct Import and not through the API, the import_id will have the format:
     * 'YNAB:[milliunit_amount]:[iso_date]:[occurrence]'. For example, a transaction dated 2015-12-30 in the amount of
     * -$294.23 USD would have an import_id of 'YNAB:-294230:2015-12-30:1’. If a second transaction on the same account
     * was imported and had the same date and same amount, its import_id would be 'YNAB:-294230:2015-12-30:2’.
     * @return string|null
     */
    public function getImportId(): ?string;

    /**
     * Whether or not the transaction has been deleted. Deleted transactions will only be included in delta requests.
     * @return bool
     */
    public function isDeleted(): bool;
}
