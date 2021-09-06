<?php

declare(strict_types=1);

namespace YNAB\Model\Transactions;

interface SubTransactionInterface
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @return string
     */
    public function getTransactionId(): string;

    /**
     * The subtransaction amount in milliunits format
     * @return int
     */
    public function getAmount(): int;

    /**
     * @return string|null
     */
    public function getMemo(): ?string;

    /**
     * @return string|null
     */
    public function getPayeeId(): ?string;

    /**
     * @return string|null
     */
    public function getPayeeName(): ?string;

    /**
     * @return string|null
     */
    public function getCategoryId(): ?string;

    /**
     * @return string|null
     */
    public function getCategoryName(): ?string;

    /**
     * If a transfer, the account_id which the subtransaction transfers to
     * @return string|null
     */
    public function getTransferAccountId(): ?string;

    /**
     * If a transfer, the id of transaction on the other side of the transfer
     * @return string|null
     */
    public function getTransferTransactionId(): ?string;

    /**
     * Whether or not the subtransaction has been deleted. Deleted subtransactions will only be included in delta
     * requests.
     * @return bool
     */
    public function isDeleted(): bool;
}
