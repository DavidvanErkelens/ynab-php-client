<?php

declare(strict_types=1);

namespace YNAB\Model\Payees;

interface PayeeInterface
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * If a transfer payee, the account_id to which this payee transfers to
     * @return ?string
     */
    public function getTransferAccountId(): ?string;

    /**
     * Whether or not the payee has been deleted. Deleted payees will only be included in delta requests.
     * @return bool
     */
    public function isDeleted(): bool;
}
