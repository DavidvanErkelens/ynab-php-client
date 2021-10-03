<?php

declare(strict_types=1);

namespace YNAB\Tests\Infrastructure\Accounts;

use PHPUnit\Framework\TestCase;
use YNAB\Infrastructure\Accounts\SaveAccountWrapper;
use YNAB\Model\Accounts\SaveAccount;

class SaveAccountWrapperTest extends TestCase
{
    public function testSerializeProducesCorrectJson(): void
    {
        $saveAccount = $this->mockSaveAccount();

        $wrapper = SaveAccountWrapper::wrap($saveAccount);

        $this->assertEquals($this->generateJson($saveAccount), $wrapper->serialize());
    }

    private function mockSaveAccount(): SaveAccount
    {
        return new SaveAccount('accountName', 'checking', 12345);
    }

    private function generateJson(SaveAccount $saveAccount): string
    {
        return json_encode([
            'account' => [
                'name' => $saveAccount->getName(),
                'type' => $saveAccount->getType(),
                'balance' => $saveAccount->getBalance()
            ]
        ]);
    }
}
