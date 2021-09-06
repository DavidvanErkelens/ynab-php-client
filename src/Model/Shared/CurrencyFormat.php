<?php

declare(strict_types=1);

namespace YNAB\Model\Shared;

class CurrencyFormat implements CurrencyFormatInterface
{
    private string $isoCode;
    private string $exampleFormat;
    private int $decimalDigits;
    private string $decimalSeparator;
    private bool $symbolFirst;
    private string $groupSeparator;
    private string $currencySymbol;
    private bool $displaySymbol;

    /**
     * @return string
     */
    public function getIsoCode(): string
    {
        return $this->isoCode;
    }

    /**
     * @return string
     */
    public function getExampleFormat(): string
    {
        return $this->exampleFormat;
    }

    /**
     * @return int
     */
    public function getDecimalDigits(): int
    {
        return $this->decimalDigits;
    }

    /**
     * @return string
     */
    public function getDecimalSeparator(): string
    {
        return $this->decimalSeparator;
    }

    /**
     * @return bool
     */
    public function isSymbolFirst(): bool
    {
        return $this->symbolFirst;
    }

    /**
     * @return string
     */
    public function getGroupSeparator(): string
    {
        return $this->groupSeparator;
    }

    /**
     * @return string
     */
    public function getCurrencySymbol(): string
    {
        return $this->currencySymbol;
    }

    /**
     * @return bool
     */
    public function isDisplaySymbol(): bool
    {
        return $this->displaySymbol;
    }

    /**
     * @param string $isoCode
     * @return CurrencyFormat
     */
    public function setIsoCode(string $isoCode): CurrencyFormat
    {
        $this->isoCode = $isoCode;
        return $this;
    }

    /**
     * @param string $exampleFormat
     * @return CurrencyFormat
     */
    public function setExampleFormat(string $exampleFormat): CurrencyFormat
    {
        $this->exampleFormat = $exampleFormat;
        return $this;
    }

    /**
     * @param int $decimalDigits
     * @return CurrencyFormat
     */
    public function setDecimalDigits(int $decimalDigits): CurrencyFormat
    {
        $this->decimalDigits = $decimalDigits;
        return $this;
    }

    /**
     * @param string $decimalSeparator
     * @return CurrencyFormat
     */
    public function setDecimalSeparator(string $decimalSeparator): CurrencyFormat
    {
        $this->decimalSeparator = $decimalSeparator;
        return $this;
    }

    /**
     * @param bool $symbolFirst
     * @return CurrencyFormat
     */
    public function setSymbolFirst(bool $symbolFirst): CurrencyFormat
    {
        $this->symbolFirst = $symbolFirst;
        return $this;
    }

    /**
     * @param string $groupSeparator
     * @return CurrencyFormat
     */
    public function setGroupSeparator(string $groupSeparator): CurrencyFormat
    {
        $this->groupSeparator = $groupSeparator;
        return $this;
    }

    /**
     * @param string $currencySymbol
     * @return CurrencyFormat
     */
    public function setCurrencySymbol(string $currencySymbol): CurrencyFormat
    {
        $this->currencySymbol = $currencySymbol;
        return $this;
    }

    /**
     * @param bool $displaySymbol
     * @return CurrencyFormat
     */
    public function setDisplaySymbol(bool $displaySymbol): CurrencyFormat
    {
        $this->displaySymbol = $displaySymbol;
        return $this;
    }
}
