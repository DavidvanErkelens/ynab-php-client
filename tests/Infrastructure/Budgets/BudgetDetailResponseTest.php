<?php

declare(strict_types=1);

namespace YNAB\Tests\Infrastructure\Budgets;

use PHPUnit\Framework\TestCase;
use YNAB\Infrastructure\Budgets\BudgetDetailResponse;
use YNAB\Infrastructure\Converters\DateTimeConverter;

class BudgetDetailResponseTest extends TestCase
{
    private const FILE = 'budgets-f5f3fc18-82f3-41b5-bf96-00332640b1b0.json';

    public function testDeserializeParsesAllProperties(): void
    {
        $data = file_get_contents(__DIR__ . '/../ClientResponses/GET/' . self::FILE);
        $contents = json_decode($data, true);
        $converter = new DateTimeConverter();

        $budgetResponse = BudgetDetailResponse::deserialize($data);

        $budgetData = $contents['data']['budget'];
        $budget = $budgetResponse->getData()->getBudget();

        $this->assertEquals($contents['data']['server_knowledge'], $budgetResponse->getData()->getServerKnowledge());
        $this->assertEquals($budgetData['id'], $budget->getId());
        $this->assertEquals($budgetData['name'], $budget->getName());
        $this->assertEquals($converter->parseIso8601($budgetData['last_modified_on']), $budget->getLastModifiedOn());
        $this->assertEquals($budgetData['date_format']['format'], $budget->getDateFormat()->getFormat());
        $this->assertEquals($budgetData['currency_format']['iso_code'], $budget->getCurrencyFormat()->getIsoCode());
        $this->assertEquals($budgetData['currency_format']['example_format'], $budget->getCurrencyFormat()->getExampleFormat());
        $this->assertEquals($budgetData['currency_format']['decimal_digits'], $budget->getCurrencyFormat()->getDecimalDigits());
        $this->assertEquals($budgetData['currency_format']['decimal_separator'], $budget->getCurrencyFormat()->getDecimalSeparator());
        $this->assertEquals($budgetData['currency_format']['symbol_first'], $budget->getCurrencyFormat()->isSymbolFirst());
        $this->assertEquals($budgetData['currency_format']['group_separator'], $budget->getCurrencyFormat()->getGroupSeparator());
        $this->assertEquals($budgetData['currency_format']['currency_symbol'], $budget->getCurrencyFormat()->getCurrencySymbol());
        $this->assertEquals($budgetData['currency_format']['display_symbol'], $budget->getCurrencyFormat()->isDisplaySymbol());
        $this->assertEquals($budgetData['first_month'], $budget->getFirstMonth());
        $this->assertEquals($budgetData['last_month'], $budget->getLastMonth());

        $this->assertCount(count($budgetData['accounts']), $budget->getAccounts());
        for ($i = 0; $i < count($budget->getAccounts()); $i++) {
            $this->assertEquals($budgetData['accounts'][$i]['id'], $budget->getAccounts()[$i]->getId());
            $this->assertEquals($budgetData['accounts'][$i]['name'], $budget->getAccounts()[$i]->getName());
            $this->assertEquals($budgetData['accounts'][$i]['type'], $budget->getAccounts()[$i]->getType());
            $this->assertEquals($budgetData['accounts'][$i]['on_budget'], $budget->getAccounts()[$i]->isOnBudget());
            $this->assertEquals($budgetData['accounts'][$i]['closed'], $budget->getAccounts()[$i]->isClosed());
            $this->assertEquals($budgetData['accounts'][$i]['note'], $budget->getAccounts()[$i]->getNote());
            $this->assertEquals($budgetData['accounts'][$i]['balance'], $budget->getAccounts()[$i]->getBalance());
            $this->assertEquals($budgetData['accounts'][$i]['cleared_balance'], $budget->getAccounts()[$i]->getClearedBalance());
            $this->assertEquals($budgetData['accounts'][$i]['uncleared_balance'], $budget->getAccounts()[$i]->getUnclearedBalance());
            $this->assertEquals($budgetData['accounts'][$i]['transfer_payee_id'], $budget->getAccounts()[$i]->getTransferPayeeId());
            $this->assertEquals($budgetData['accounts'][$i]['deleted'], $budget->getAccounts()[$i]->isDeleted());
        }

        $this->assertCount(count($budgetData['payees']), $budget->getPayees());
        for ($i = 0; $i < count($budget->getPayees()); $i++) {
            $this->assertEquals($budgetData['payees'][$i]['id'], $budget->getPayees()[$i]->getId());
            $this->assertEquals($budgetData['payees'][$i]['name'], $budget->getPayees()[$i]->getName());
            $this->assertEquals($budgetData['payees'][$i]['transfer_account_id'], $budget->getPayees()[$i]->getTransferAccountId());
            $this->assertEquals($budgetData['payees'][$i]['deleted'], $budget->getPayees()[$i]->isDeleted());
        }

        $this->assertCount(count($budgetData['payee_locations']), $budget->getPayeeLocations());
        for ($i = 0; $i < count($budget->getPayeeLocations()); $i++) {
            $this->assertEquals($budgetData['payee_locations'][$i]['id'], $budget->getPayeeLocations()[$i]->getId());
            $this->assertEquals($budgetData['payee_locations'][$i]['payee_id'], $budget->getPayeeLocations()[$i]->getPayeeId());
            $this->assertEquals($budgetData['payee_locations'][$i]['latitude'], $budget->getPayeeLocations()[$i]->getLatitude());
            $this->assertEquals($budgetData['payee_locations'][$i]['longitude'], $budget->getPayeeLocations()[$i]->getLongitude());
            $this->assertEquals($budgetData['payee_locations'][$i]['deleted'], $budget->getPayeeLocations()[$i]->isDeleted());
        }

        $this->assertCount(count($budgetData['category_groups']), $budget->getCategoryGroups());
        for ($i = 0; $i < count($budget->getCategoryGroups()); $i++) {
            $this->assertEquals($budgetData['category_groups'][$i]['id'], $budget->getCategoryGroups()[$i]->getId());
            $this->assertEquals($budgetData['category_groups'][$i]['name'], $budget->getCategoryGroups()[$i]->getName());
            $this->assertEquals($budgetData['category_groups'][$i]['hidden'], $budget->getCategoryGroups()[$i]->isHidden());
            $this->assertEquals($budgetData['category_groups'][$i]['deleted'], $budget->getCategoryGroups()[$i]->isDeleted());
        }

        $this->assertCount(count($budgetData['categories']), $budget->getCategories());
        for ($i = 0; $i < count($budget->getCategories()); $i++) {
            $this->assertEquals($budgetData['categories'][$i]['id'], $budget->getCategories()[$i]->getId());
            $this->assertEquals($budgetData['categories'][$i]['category_group_id'], $budget->getCategories()[$i]->getCategoryGroupId());
            $this->assertEquals($budgetData['categories'][$i]['name'], $budget->getCategories()[$i]->getName());
            $this->assertEquals($budgetData['categories'][$i]['hidden'], $budget->getCategories()[$i]->isHidden());
            $this->assertEquals($budgetData['categories'][$i]['original_category_group_id'], $budget->getCategories()[$i]->getOriginalCategoryGroupId());
            $this->assertEquals($budgetData['categories'][$i]['note'], $budget->getCategories()[$i]->getNote());
            $this->assertEquals($budgetData['categories'][$i]['budgeted'], $budget->getCategories()[$i]->getBudgeted());
            $this->assertEquals($budgetData['categories'][$i]['activity'], $budget->getCategories()[$i]->getActivity());
            $this->assertEquals($budgetData['categories'][$i]['balance'], $budget->getCategories()[$i]->getBalance());
            $this->assertEquals($budgetData['categories'][$i]['goal_type'], $budget->getCategories()[$i]->getGoalType());
            $this->assertEquals($budgetData['categories'][$i]['goal_creation_month'], $budget->getCategories()[$i]->getGoalCreationMonth());
            $this->assertEquals($budgetData['categories'][$i]['goal_target'], $budget->getCategories()[$i]->getGoalTarget());
            $this->assertEquals($budgetData['categories'][$i]['goal_target_month'], $budget->getCategories()[$i]->getGoalTargetMonth());
            $this->assertEquals($budgetData['categories'][$i]['goal_percentage_complete'], $budget->getCategories()[$i]->getGoalPercentageComplete());
            $this->assertEquals($budgetData['categories'][$i]['deleted'], $budget->getCategories()[$i]->isDeleted());
        }

        $this->assertCount(count($budgetData['months']), $budget->getMonths());
        for ($i = 0; $i < count($budget->getMonths()); $i++) {
            $this->assertEquals($budgetData['months'][$i]['month'], $budget->getMonths()[$i]->getMonth());
            $this->assertEquals($budgetData['months'][$i]['note'], $budget->getMonths()[$i]->getNote());
            $this->assertEquals($budgetData['months'][$i]['income'], $budget->getMonths()[$i]->getIncome());
            $this->assertEquals($budgetData['months'][$i]['budgeted'], $budget->getMonths()[$i]->getBudgeted());
            $this->assertEquals($budgetData['months'][$i]['activity'], $budget->getMonths()[$i]->getActivity());
            $this->assertEquals($budgetData['months'][$i]['to_be_budgeted'], $budget->getMonths()[$i]->getToBeBudgeted());
            $this->assertEquals($budgetData['months'][$i]['age_of_money'], $budget->getMonths()[$i]->getAgeOfMoney());
            $this->assertEquals($budgetData['months'][$i]['deleted'], $budget->getMonths()[$i]->isDeleted());

            $this->assertCount(count($budgetData['months'][$i]['categories']), $budget->getMonths()[$i]->getCategories());
            for ($j = 0; $j < count($budget->getMonths()[$i]->getCategories()); $j++) {
                $this->assertEquals($budgetData['months'][$i]['categories'][$j]['id'], $budget->getMonths()[$i]->getCategories()[$j]->getId());
                $this->assertEquals($budgetData['months'][$i]['categories'][$j]['category_group_id'], $budget->getMonths()[$i]->getCategories()[$j]->getCategoryGroupId());
                $this->assertEquals($budgetData['months'][$i]['categories'][$j]['name'], $budget->getMonths()[$i]->getCategories()[$j]->getName());
                $this->assertEquals($budgetData['months'][$i]['categories'][$j]['hidden'], $budget->getMonths()[$i]->getCategories()[$j]->isHidden());
                $this->assertEquals($budgetData['months'][$i]['categories'][$j]['original_category_group_id'], $budget->getMonths()[$i]->getCategories()[$j]->getOriginalCategoryGroupId());
                $this->assertEquals($budgetData['months'][$i]['categories'][$j]['note'], $budget->getMonths()[$i]->getCategories()[$j]->getNote());
                $this->assertEquals($budgetData['months'][$i]['categories'][$j]['budgeted'], $budget->getMonths()[$i]->getCategories()[$j]->getBudgeted());
                $this->assertEquals($budgetData['months'][$i]['categories'][$j]['activity'], $budget->getMonths()[$i]->getCategories()[$j]->getActivity());
                $this->assertEquals($budgetData['months'][$i]['categories'][$j]['balance'], $budget->getMonths()[$i]->getCategories()[$j]->getBalance());
                $this->assertEquals($budgetData['months'][$i]['categories'][$j]['goal_type'], $budget->getMonths()[$i]->getCategories()[$j]->getGoalType());
                $this->assertEquals($budgetData['months'][$i]['categories'][$j]['goal_creation_month'], $budget->getMonths()[$i]->getCategories()[$j]->getGoalCreationMonth());
                $this->assertEquals($budgetData['months'][$i]['categories'][$j]['goal_target'], $budget->getMonths()[$i]->getCategories()[$j]->getGoalTarget());
                $this->assertEquals($budgetData['months'][$i]['categories'][$j]['goal_target_month'], $budget->getMonths()[$i]->getCategories()[$j]->getGoalTargetMonth());
                $this->assertEquals($budgetData['months'][$i]['categories'][$j]['goal_percentage_complete'], $budget->getMonths()[$i]->getCategories()[$j]->getGoalPercentageComplete());
                $this->assertEquals($budgetData['months'][$i]['categories'][$j]['deleted'], $budget->getMonths()[$i]->getCategories()[$j]->isDeleted());
            }
        }

        $this->assertCount(count($budgetData['transactions']), $budget->getTransactions());
        for ($i = 0; $i < count($budget->getTransactions()); $i++) {
            $this->assertEquals($budgetData['transactions'][$i]['id'], $budget->getTransactions()[$i]->getId());
            $this->assertEquals($budgetData['transactions'][$i]['date'], $budget->getTransactions()[$i]->getDate());
            $this->assertEquals($budgetData['transactions'][$i]['amount'], $budget->getTransactions()[$i]->getAmount());
            $this->assertEquals($budgetData['transactions'][$i]['memo'], $budget->getTransactions()[$i]->getMemo());
            $this->assertEquals($budgetData['transactions'][$i]['cleared'], $budget->getTransactions()[$i]->getCleared());
            $this->assertEquals($budgetData['transactions'][$i]['approved'], $budget->getTransactions()[$i]->isApproved());
            $this->assertEquals($budgetData['transactions'][$i]['flag_color'], $budget->getTransactions()[$i]->getFlagColor());
            $this->assertEquals($budgetData['transactions'][$i]['account_id'], $budget->getTransactions()[$i]->getAccountId());
            $this->assertEquals($budgetData['transactions'][$i]['payee_id'], $budget->getTransactions()[$i]->getPayeeId());
            $this->assertEquals($budgetData['transactions'][$i]['category_id'], $budget->getTransactions()[$i]->getCategoryId());
            $this->assertEquals($budgetData['transactions'][$i]['transfer_account_id'], $budget->getTransactions()[$i]->getTransferAccountId());
            $this->assertEquals($budgetData['transactions'][$i]['transfer_transaction_id'], $budget->getTransactions()[$i]->getTransferTransactionId());
            $this->assertEquals($budgetData['transactions'][$i]['matched_transaction_id'], $budget->getTransactions()[$i]->getMatchedTransactionId());
            $this->assertEquals($budgetData['transactions'][$i]['import_id'], $budget->getTransactions()[$i]->getImportId());
            $this->assertEquals($budgetData['transactions'][$i]['deleted'], $budget->getTransactions()[$i]->isDeleted());
        }

        // TODO test subtransactions, scheduled transactions and scheduled subtransactions
    }
}
