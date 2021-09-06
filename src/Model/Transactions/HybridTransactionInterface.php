<?php

declare(strict_types=1);

namespace YNAB\Model\Transactions;

use DateTime;

interface HybridTransactionInterface
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @return DateTime
     */
    public function getDate(): DateTime;

    /**
     * @return int
     */
    public function getAmount(): int;

    /**
     * @return string|null
     */
    public function getMemo(): ?string;

    /**
     * @return string
     */
    public function getCleared(): string;

    /**
     * @return bool
     */
    public function isApproved(): bool;

    /**
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
     * @return string|null
     */
    public function getTransferAccountId(): ?string;

    /**
     * @return string|null
     */
    public function getTransferTransactionId(): ?string;

    /**
     * @return string|null
     */
    public function getMatchedTransactionId(): ?string;

    /**
     * @return string|null
     */
    public function getImportId(): ?string;

    /**
     * @return bool
     */
    public function isDeleted(): bool;

    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @return string|null
     */
    public function getParentTransactionId(): ?string;

    /**
     * @return string
     */
    public function getAccountName(): string;

    /**
     * @return string|null
     */
    public function getPayeeName(): ?string;

    /**
     * @return string|null
     */
    public function getCategoryName(): ?string;
}
