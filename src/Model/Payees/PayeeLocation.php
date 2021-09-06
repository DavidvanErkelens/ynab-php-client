<?php

declare(strict_types=1);

namespace YNAB\Model\Payees;

class PayeeLocation implements PayeeLocationInterface
{
    private string $id;
    private string $payeeId;
    private string $latitude;
    private string $longitude;
    private bool $deleted;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPayeeId(): string
    {
        return $this->payeeId;
    }

    /**
     * @return string
     */
    public function getLatitude(): string
    {
        return $this->latitude;
    }

    /**
     * @return string
     */
    public function getLongitude(): string
    {
        return $this->longitude;
    }

    /**
     * @return bool
     */
    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    /**
     * @param string $id
     * @return PayeeLocation
     */
    public function setId(string $id): PayeeLocation
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $payeeId
     * @return PayeeLocation
     */
    public function setPayeeId(string $payeeId): PayeeLocation
    {
        $this->payeeId = $payeeId;
        return $this;
    }

    /**
     * @param string $latitude
     * @return PayeeLocation
     */
    public function setLatitude(string $latitude): PayeeLocation
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @param string $longitude
     * @return PayeeLocation
     */
    public function setLongitude(string $longitude): PayeeLocation
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * @param bool $deleted
     * @return PayeeLocation
     */
    public function setDeleted(bool $deleted): PayeeLocation
    {
        $this->deleted = $deleted;
        return $this;
    }
}
