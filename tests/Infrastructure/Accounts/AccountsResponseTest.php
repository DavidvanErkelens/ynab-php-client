<?php

declare(strict_types=1);

namespace YNAB\Tests\Infrastructure\Accounts;

use PHPUnit\Framework\TestCase;
use YNAB\Infrastructure\Accounts\AccountsResponse;

class AccountsResponseTest extends TestCase
{
    const FILE = 'budgets-f5f3fc18-82f3-41b5-bf96-00332640b1b0-accounts.json';

    public function testDeserializeParsesAllProperties(): void
    {
        $data = file_get_contents(__DIR__ . '/../ClientResponses/GET/' . self::FILE);
        $contents = json_decode($data, true);

        $accountsResponse = AccountsResponse::deserialize($data);

        $accountsData = $contents['data']['accounts'];
        $accounts = $accountsResponse->getData()->getAccounts();

        $this->assertCount(count($accountsData), $accounts);
        $this->assertEquals(
            $contents['data']['server_knowledge'],
            $accountsResponse->getData()->getServerKnowledge()
        );

        for ($i = 0; $i < count($accountsData); $i++) {
            $this->assertEquals($accountsData[$i]['id'], $accounts[$i]->getId());
            $this->assertEquals($accountsData[$i]['name'], $accounts[$i]->getName());
            $this->assertEquals($accountsData[$i]['type'], $accounts[$i]->getType());
            $this->assertEquals($accountsData[$i]['on_budget'], $accounts[$i]->isOnBudget());
            $this->assertEquals($accountsData[$i]['closed'], $accounts[$i]->isClosed());
            $this->assertEquals($accountsData[$i]['note'], $accounts[$i]->getNote());
            $this->assertEquals($accountsData[$i]['balance'], $accounts[$i]->getBalance());
            $this->assertEquals($accountsData[$i]['cleared_balance'], $accounts[$i]->getClearedBalance());
            $this->assertEquals($accountsData[$i]['uncleared_balance'], $accounts[$i]->getUnclearedBalance());
            $this->assertEquals($accountsData[$i]['transfer_payee_id'], $accounts[$i]->getTransferPayeeId());
            $this->assertEquals($accountsData[$i]['direct_import_linked'], $accounts[$i]->isDirectImportLinked());
            $this->assertEquals($accountsData[$i]['direct_import_in_error'], $accounts[$i]->isDirectImportInError());
            $this->assertEquals($accountsData[$i]['deleted'], $accounts[$i]->isDeleted());
        }
    }
}
