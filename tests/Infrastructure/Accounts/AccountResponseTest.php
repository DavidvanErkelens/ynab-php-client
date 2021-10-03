<?php

declare(strict_types=1);

namespace YNAB\Tests\Infrastructure\Accounts;

use PHPUnit\Framework\TestCase;
use YNAB\Infrastructure\Accounts\AccountResponse;

class AccountResponseTest extends TestCase
{
    const FILE = 'budgets-f5f3fc18-82f3-41b5-bf96-00332640b1b0-accounts-164199d0-644e-4e4d-b1fd-5343d1f45240.json';

    public function testDeserializeParsesAllProperties(): void
    {
        $data = file_get_contents(__DIR__ . '/../ClientResponses/GET/' . self::FILE);
        $contents = json_decode($data, true);

        $accountResponse = AccountResponse::deserialize($data);

        $accountData = $contents['data']['account'];
        $account = $accountResponse->getData()->getAccount();

        $this->assertEquals($accountData['id'], $account->getId());
        $this->assertEquals($accountData['name'], $account->getName());
        $this->assertEquals($accountData['type'], $account->getType());
        $this->assertEquals($accountData['on_budget'], $account->isOnBudget());
        $this->assertEquals($accountData['closed'], $account->isClosed());
        $this->assertEquals($accountData['note'], $account->getNote());
        $this->assertEquals($accountData['balance'], $account->getBalance());
        $this->assertEquals($accountData['cleared_balance'], $account->getClearedBalance());
        $this->assertEquals($accountData['uncleared_balance'], $account->getUnclearedBalance());
        $this->assertEquals($accountData['transfer_payee_id'], $account->getTransferPayeeId());
        $this->assertEquals($accountData['direct_import_linked'], $account->isDirectImportLinked());
        $this->assertEquals($accountData['direct_import_in_error'], $account->isDirectImportInError());
        $this->assertEquals($accountData['deleted'], $account->isDeleted());
    }
}
