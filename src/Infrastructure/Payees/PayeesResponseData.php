<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Payees;

use YNAB\Model\Payees\Payee;

class PayeesResponseData implements PayeesResponseDataInterface
{
    /** @var Payee[] */
    private array $payees;
    private int $serverKnowledge;

    /**
     * @return Payee[]
     */
    public function getPayees(): array
    {
        return $this->payees;
    }

    /**
     * @return int
     */
    public function getServerKnowledge(): int
    {
        return $this->serverKnowledge;
    }

    /**
     * @param Payee[] $payees
     * @return PayeesResponseData
     */
    public function setPayees(array $payees): PayeesResponseData
    {
        $this->payees = $payees;
        return $this;
    }

    /**
     * @param int $serverKnowledge
     * @return PayeesResponseData
     */
    public function setServerKnowledge(int $serverKnowledge): PayeesResponseData
    {
        $this->serverKnowledge = $serverKnowledge;
        return $this;
    }
}
