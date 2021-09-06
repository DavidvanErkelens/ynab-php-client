<?php

declare(strict_types=1);

namespace YNAB;

use RuntimeException;
use YNAB\Exceptions\ApiClientException;
use YNAB\Exceptions\YnabErrorException;
use YNAB\Infrastructure\Accounts\AccountResponseInterface;
use YNAB\Infrastructure\Accounts\AccountsResponseInterface;
use YNAB\Infrastructure\Budgets\BudgetDetailResponseInterface;
use YNAB\Infrastructure\Budgets\BudgetSettingsResponseInterface;
use YNAB\Infrastructure\Budgets\BudgetSummaryResponseInterface;
use YNAB\Infrastructure\Categories\CategoriesResponseInterface;
use YNAB\Infrastructure\Categories\CategoryResponseInterface;
use YNAB\Infrastructure\Categories\SaveCategoryResponseInterface;
use YNAB\Infrastructure\Months\MonthDetailResponseInterface;
use YNAB\Infrastructure\Months\MonthSummariesResponseInterface;
use YNAB\Infrastructure\Payees\PayeeLocationResponseInterface;
use YNAB\Infrastructure\Payees\PayeeLocationsResponseInterface;
use YNAB\Infrastructure\Payees\PayeeResponseInterface;
use YNAB\Infrastructure\Payees\PayeesResponseInterface;
use YNAB\Infrastructure\Transactions\TransactionResponseInterface;
use YNAB\Infrastructure\Transactions\TransactionsResponseInterface;
use YNAB\Infrastructure\Transactions\HybridTransactionsResponseInterface;
use YNAB\Infrastructure\Transactions\TransactionsImportResponseInterface;
use YNAB\Infrastructure\Transactions\SaveTransactionsResponseInterface;
use YNAB\Infrastructure\Transactions\ScheduledTransactionResponseInterface;
use YNAB\Infrastructure\Transactions\ScheduledTransactionsResponseInterface;
use YNAB\Infrastructure\User\UserResponseInterface;
use YNAB\Model\Accounts\SaveAccount;
use YNAB\Model\Categories\SaveMonthCategory;
use YNAB\Model\Transactions\SaveTransaction;
use YNAB\Model\Transactions\UpdateTransaction;

interface ClientInterface
{
    /**
     * The last reported rate limit header by the YNAB API. Null if not available.
     *
     * @return int|null
     */
    public function getRateLimit(): ?int;

    /**
     * Returns authenticated user information.
     *
     * @return UserResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function getUser(): UserResponseInterface;

    /**
     * Returns budgets list with summary information.
     *
     * @param bool $includeAccounts
     *      Whether to include the list of budget accounts.
     *
     * @return BudgetSummaryResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function getBudgets(bool $includeAccounts = false): BudgetSummaryResponseInterface;

    /**
     * Returns a single budget with all related entities. This resource is effectively a full budget export.
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     * @param int|null $lastKnowledgeOfServer
     *      The starting server knowledge. If provided, only entities that have changed since last_knowledge_of_server
     *      will be included.
     *
     * @return BudgetDetailResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function getBudget(string $budgetId, ?int $lastKnowledgeOfServer = null): BudgetDetailResponseInterface;

    /**
     * Returns settings for a budget.
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     *
     * @return BudgetSettingsResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function getBudgetSettings(string $budgetId): BudgetSettingsResponseInterface;

    /**
     * Returns all accounts.
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     * @param int|null $lastKnowledgeOfServer
     *      The starting server knowledge. If provided, only entities that have changed since last_knowledge_of_server
     *      will be included.
     *
     * @return AccountsResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function getAccounts(string $budgetId, ?int $lastKnowledgeOfServer = null): AccountsResponseInterface;

    /**
     * Creates a new account.
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     * @param SaveAccount $account
     *      The account to create.
     *
     * @return AccountResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function createAccount(string $budgetId, SaveAccount $account): AccountResponseInterface;

    /**
     * Returns a single account.
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     * @param string $accountId
     *      The id of the account.
     *
     * @return AccountResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function getAccount(string $budgetId, string $accountId): AccountResponseInterface;

    /**
     * Returns all categories grouped by category group. Amounts (budgeted, activity, balance, etc.)
     * are specific to the current budget month (UTC).
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     * @param int|null $lastKnowledgeOfServer
     *      The starting server knowledge. If provided, only entities that have changed since last_knowledge_of_server
     *      will be included.
     *
     * @return CategoriesResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function getCategories(string $budgetId, ?int $lastKnowledgeOfServer = null): CategoriesResponseInterface;

    /**
     * Returns a single category. Amounts (budgeted, activity, balance, etc.) are specific to the current
     * budget month (UTC).
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     * @param string $categoryId
     *      The id of the category.
     *
     * @return CategoryResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function getCategory(string $budgetId, string $categoryId): CategoryResponseInterface;

    /**
     * Returns a single category for a specific budget month. Amounts (budgeted, activity, balance, etc.)
     * are specific to the current budget month (UTC).
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     * @param string $month
     *      The budget month in ISO format (e.g. 2016-12-01) (“current” can also be used to specify the
     *      current calendar month (UTC))
     * @param string $categoryId
     *      The id of the category
     *
     * @return CategoryResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function getCategoryForMonth(
        string $budgetId,
        string $month,
        string $categoryId
    ): CategoryResponseInterface;

    /**
     * Update a category for a specific month. Only budgeted amount can be updated.
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     * @param string $month
     *      The budget month in ISO format (e.g. 2016-12-01) (“current” can also be used to specify the
     *      current calendar month (UTC))
     * @param string $categoryId
     *      The id of the category
     * @param SaveMonthCategory $category
     *      The category to update. Only budgeted amount can be updated and any other fields specified will be ignored.
     *
     * @return SaveCategoryResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function updateCategoryForMonth(
        string $budgetId,
        string $month,
        string $categoryId,
        SaveMonthCategory $category
    ): SaveCategoryResponseInterface;

    /**
     * Returns all payees.
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     * @param int|null $lastKnowledgeOfServer
     *      The starting server knowledge. If provided, only entities that have changed since last_knowledge_of_server
     *      will be included.
     *
     * @return PayeesResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function getPayees(string $budgetId, ?int $lastKnowledgeOfServer = null): PayeesResponseInterface;

    /**
     * Returns a single payee.
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     * @param string $payeeId
     *      The id of the payee
     *
     * @return PayeeResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function getPayee(string $budgetId, string $payeeId): PayeeResponseInterface;

    /**
     * Returns all payee locations.
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     *
     * @return PayeeLocationsResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function getPayeeLocations(string $budgetId): PayeeLocationsResponseInterface;

    /**
     * Returns a single payee location.
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     * @param string $payeeLocationId
     *      id of payee location
     *
     * @return PayeeLocationResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function getPayeeLocation(string $budgetId, string $payeeLocationId): PayeeLocationResponseInterface;

    /**
     * Returns all payee locations for a specified payee.
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     * @param string $payeeId
     *      id of payee location
     *
     * @return PayeeLocationsResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function getLocationsForPayee(string $budgetId, string $payeeId): PayeeLocationsResponseInterface;

    /**
     * Returns all budget months.
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     * @param int|null $lastKnowledgeOfServer
     *      The starting server knowledge. If provided, only entities that have changed since last_knowledge_of_server
     *      will be included.
     *
     * @return MonthSummariesResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function getMonths(string $budgetId, ?int $lastKnowledgeOfServer = null): MonthSummariesResponseInterface;

    /**
     * Returns a single budget month.
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     * @param string $month
     *      The budget month in ISO format (e.g. 2016-12-01) (“current” can also be used to specify
     *      the current calendar month (UTC))
     *
     * @return MonthDetailResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function getMonth(string $budgetId, string $month): MonthDetailResponseInterface;

    /**
     * Returns budget transactions.
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     * @param string|null $sinceDate
     *      If specified, only transactions on or after this date will be included. The date should be ISO formatted
     *      (e.g. 2016-12-30).
     * @param string|null $type
     *      If specified, only transactions of the specified type will be included. “uncategorized” and “unapproved”
     *      are currently supported
     * @param int|null $lastKnowledgeOfServer
     *      The starting server knowledge. If provided, only entities that have changed since last_knowledge_of_server
     *      will be included.
     *
     * @return TransactionsResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function getTransactions(
        string $budgetId,
        ?string $sinceDate = null,
        ?string $type = null,
        ?int $lastKnowledgeOfServer = null
    ): TransactionsResponseInterface;

    /**
     * Creates a single transaction. Scheduled transactions cannot be created on this endpoint.
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     * @param SaveTransaction $transaction
     *      The transaction to create.
     *
     * @return SaveTransactionsResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function createTransaction(string $budgetId, SaveTransaction $transaction): SaveTransactionsResponseInterface;

    /**
     * Creates multiple transactions. Scheduled transactions cannot be created on this endpoint.
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     * @param SaveTransaction[] $transactions
     *      The transactions to create.
     *
     * @return SaveTransactionsResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function createTransactions(string $budgetId, array $transactions): SaveTransactionsResponseInterface;

    /**
     * Updates multiple transactions, by id or import_id.
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     * @param UpdateTransaction[] $transactions
     *      The transactions to update. Each transaction must have either an id or import_id specified. If id is
     *      specified as null an import_id value can be provided which will allow transaction(s) to be updated by their
     *      import_id.  If an id is specified, it will always be used for lookup.
     *
     * @return SaveTransactionsResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function updateTransactions(string $budgetId, array $transactions): SaveTransactionsResponseInterface;

    /**
     * Imports available transactions on all linked accounts for the given budget. Linked accounts allow transactions
     * to be imported directly from a specified financial institution and this endpoint initiates that import. Sending
     * a request to this endpoint is the equivalent of clicking “Import” on each account in the web application or
     * tapping the “New Transactions” banner in the mobile applications. The response for this endpoint contains the
     * transaction ids that have been imported.
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     *
     * @return TransactionsImportResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function importTransactions(string $budgetId): TransactionsImportResponseInterface;

    /**
     * Returns a single transaction.
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     * @param string    $transactionId
     *      The id of the transaction
     *
     * @return TransactionResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function getTransaction(string $budgetId, string $transactionId): TransactionResponseInterface;

    /**
     * Updates a single transaction.
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     * @param string $transactionId
     *      The id of the transaction
     * @param SaveTransaction $transaction
     *      The transaction to update
     *
     * @return TransactionResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function updateTransaction(
        string $budgetId,
        string $transactionId,
        SaveTransaction $transaction
    ): TransactionResponseInterface;

    /**
     * Returns all transactions for a specified account.
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     * @param string $accountId
     *      The id of the account
     * @param string|null $sinceDate
     *      If specified, only transactions on or after this date will be included. The date should be ISO formatted
     *      (e.g. 2016-12-30).
     * @param string|null $type
     *      If specified, only transactions of the specified type will be included. “uncategorized” and “unapproved”
     *      are currently supported.
     * @param int|null $lastKnowledgeOfServer
     *      The starting server knowledge. If provided, only entities that have changed since last_knowledge_of_server
     *      will be included.
     *
     * @return TransactionsResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function getAccountTransactions(
        string $budgetId,
        string $accountId,
        ?string $sinceDate = null,
        ?string $type = null,
        ?int $lastKnowledgeOfServer = null
    ): TransactionsResponseInterface;

    /**
     * Returns all transactions for a specified category.
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     * @param string $categoryId
     *      The id of the category
     * @param string|null $sinceDate
     *      If specified, only transactions on or after this date will be included. The date should be ISO formatted
     *      (e.g. 2016-12-30).
     * @param string|null $type
     *      If specified, only transactions of the specified type will be included. “uncategorized” and “unapproved”
     *      are currently supported.
     * @param int|null $lastKnowledgeOfServer
     *      The starting server knowledge. If provided, only entities that have changed since last_knowledge_of_server
     *      will be included.
     *
     * @return HybridTransactionsResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function getCategoryTransactions(
        string $budgetId,
        string $categoryId,
        ?string $sinceDate = null,
        ?string $type = null,
        ?int $lastKnowledgeOfServer = null
    ): HybridTransactionsResponseInterface;

    /**
     * Returns all transactions for a specified payee.
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     * @param string $payeeId
     *      The id of the payee
     * @param string|null $sinceDate
     *      If specified, only transactions on or after this date will be included. The date should be ISO formatted
     *      (e.g. 2016-12-30).
     * @param string|null $type
     *      If specified, only transactions of the specified type will be included. “uncategorized” and “unapproved”
     *      are currently supported.
     * @param int|null $lastKnowledgeOfServer
     *      The starting server knowledge. If provided, only entities that have changed since last_knowledge_of_server
     *      will be included.
     *
     * @return HybridTransactionsResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function getPayeeTransactions(
        string $budgetId,
        string $payeeId,
        ?string $sinceDate = null,
        ?string $type = null,
        ?int $lastKnowledgeOfServer = null
    ): HybridTransactionsResponseInterface;

    /**
     * Returns all scheduled transactions.
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     * @param int|null $lastKnowledgeOfServer
     *      The starting server knowledge. If provided, only entities that have changed since last_knowledge_of_server
     *      will be included.
     *
     * @return ScheduledTransactionsResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    public function getScheduledTransactions(
        string $budgetId,
        ?int $lastKnowledgeOfServer = null
    ): ScheduledTransactionsResponseInterface;

    /**
     * Returns a single scheduled transaction.
     *
     * @param string $budgetId
     *      The id of the budget. “last-used” can be used to specify the last used  budget and  “default” can be used
     *      if default budget selection is enabled (see: https://api.youneedabudget.com/#oauth-default-budget).
     * @param string $scheduledTransactionId
     *      The id of the scheduled transaction
     *
     * @return ScheduledTransactionResponseInterface
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
}
