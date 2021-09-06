<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Transactions;

use YNAB\Model\Transactions\TransactionDetail;

interface TransactionResponseDataInterface
{
    /**
     * @return TransactionDetail
     */
    public function getTransaction(): TransactionDetail;
}
