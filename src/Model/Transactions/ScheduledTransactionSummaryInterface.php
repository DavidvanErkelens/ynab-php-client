<?php

declare(strict_types=1);

namespace YNAB\Model\Transactions;

interface ScheduledTransactionSummaryInterface
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * The first date for which the Scheduled Transaction was scheduled.
     * @return string
     */
    public function getDateFirst(): string;

    /**
     * The next date for which the Scheduled Transaction is scheduled.
     * @return string
     */
    public function getDateNext(): string;

    /**
     * [ never, daily, weekly, everyOtherWeek, twiceAMonth, every4Weeks, monthly, everyOtherMonth, every3Months,
     * every4Months, twiceAYear, yearly,  ]
     * @return string
     */
    public function getFrequency(): string;

    /**
     * The scheduled transaction amount in milliunits format
     * @return int
     */
    public function getAmount(): int;

    /**
     * @return string|null
     */
    public function getMemo(): ?string;

    /**
     * The scheduled transaction flag
     * [ red, orange, yellow, green, blue, purple, ]
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
     * If a transfer, the account_id which the scheduled transaction transfers to
     * @return string|null
     */
    public function getTransferAccountId(): ?string;

    /**
     * Whether or not the scheduled transaction has been deleted. Deleted scheduled transactions will only be included
     * in delta requests.
     * @return bool
     */
    public function isDeleted(): bool;
}
