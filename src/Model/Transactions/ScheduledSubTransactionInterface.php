<?php

declare(strict_types=1);

namespace YNAB\Model\Transactions;

interface ScheduledSubTransactionInterface
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @return string
     */
    public function getScheduledTransactionId(): string;

    /**
     * The scheduled subtransaction amount in milliunits format
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
    public function getCategoryId(): ?string;

    /**
     * If a transfer, the account_id which the scheduled subtransaction transfers to
     * @return string|null
     */
    public function getTransferAccountId(): ?string;

    /**
     * Whether or not the scheduled subtransaction has been deleted. Deleted scheduled subtransactions will only be
     * included in delta requests.
     * @return bool
     */
    public function isDeleted(): bool;
}
