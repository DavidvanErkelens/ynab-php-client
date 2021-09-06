<?php

declare(strict_types=1);

namespace YNAB\Model\Accounts;

interface AccountInterface
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
     * The type of account. Note: payPal, merchantAccount, investmentAccount, and mortgage types have been deprecated
     * and will be removed in the future.
     *
     * [ checking, savings, cash, creditCard, lineOfCredit, otherAsset, otherLiability, payPal,
     * merchantAccount, investmentAccount, mortgage ]
     * @return string
     */
    public function getType(): string;

    /**
     * Whether this account is on budget or not
     * @return bool
     */
    public function isOnBudget(): bool;

    /**
     * Whether this account is closed or not
     * @return bool
     */
    public function isClosed(): bool;

    /**
     * @return string|null
     */
    public function getNote(): ?string;

    /**
     * The current balance of the account in milliunits format
     * @return int
     */
    public function getBalance(): int;

    /**
     * The current cleared balance of the account in milliunits format
     * @return int
     */
    public function getClearedBalance(): int;

    /**
     * The current uncleared balance of the account in milliunits format
     * @return int
     */
    public function getUnclearedBalance(): int;

    /**
     * The payee id which should be used when transferring to this account
     * @return string
     */
    public function getTransferPayeeId(): string;

    /**
     * Whether or not the account is linked to a financial institution for automatic transaction import.
     * @return bool
     */
    public function isDirectImportLinked(): bool;

    /**
     * If an account linked to a financial institution (direct_import_linked=true) and the linked connection is not in
     * a healthy state, this will be true.
     * @return bool
     */
    public function isDirectImportInError(): bool;

    /**
     * Whether or not the account has been deleted. Deleted accounts will only be included in delta requests.
     * @return bool
     */
    public function isDeleted(): bool;
}
