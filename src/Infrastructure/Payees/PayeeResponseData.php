<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Payees;

use YNAB\Model\Payees\Payee;

class PayeeResponseData implements PayeeResponseDataInterface
{
    private Payee $payee;

    /**
     * @return Payee
     */
    public function getPayee(): Payee
    {
        return $this->payee;
    }

    /**
     * @param Payee $payee
     * @return PayeeResponseData
     */
    public function setPayee(Payee $payee): PayeeResponseData
    {
        $this->payee = $payee;
        return $this;
    }
}
