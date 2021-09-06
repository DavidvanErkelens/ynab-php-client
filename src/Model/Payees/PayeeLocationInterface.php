<?php

declare(strict_types=1);

namespace YNAB\Model\Payees;

interface PayeeLocationInterface
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @return string
     */
    public function getPayeeId(): string;

    /**
     * @return string
     */
    public function getLatitude(): string;

    /**
     * @return string
     */
    public function getLongitude(): string;

    /**
     * Whether or not the payee location has been deleted. Deleted payee locations will only be included in delta
     * requests.
     * @return bool
     */
    public function isDeleted(): bool;
}
