<?php

declare(strict_types=1);

namespace YNAB\Model\Shared;

interface CurrencyFormatInterface
{
    /**
     * @return string
     */
    public function getIsoCode(): string;

    /**
     * @return string
     */
    public function getExampleFormat(): string;

    /**
     * @return int
     */
    public function getDecimalDigits(): int;

    /**
     * @return string
     */
    public function getDecimalSeparator(): string;

    /**
     * @return bool
     */
    public function isSymbolFirst(): bool;

    /**
     * @return string
     */
    public function getGroupSeparator(): string;

    /**
     * @return string
     */
    public function getCurrencySymbol(): string;

    /**
     * @return bool
     */
    public function isDisplaySymbol(): bool;
}
