# Available client methods
This document describes all methods that are available on the YNAB Client object.

## User
### User info
Returns authenticated user information
```php
public function getUser(): UserResponseInterface;
```
Returns an instance of [UserResponseInterface](../src/Infrastructure/User/UserResponseInterface.php).

## Budgets
### List budgets 
Returns budgets list with summary information.
```php
public function getBudgets(bool $includeAccounts = false): BudgetSummaryResponseInterface;
```
Returns an instance of [BudgetSummaryResponseInterface](../src/Infrastructure/Budgets/BudgetSummaryResponseInterface.php).

### Single budget
Returns a single budget with all related entities. This resource is effectively a full budget export.
```php
public function getBudget(string $budgetId, ?int $lastKnowledgeOfServer = null): BudgetDetailResponseInterface;
```
Returns an instance of [BudgetDetailResponseInterface](../src/Infrastructure/Budgets/BudgetDetailResponseInterface.php).

### Budget settings
Returns settings for a budget.
```php
public function getBudgetSettings(string $budgetId): BudgetSettingsResponseInterface;
```
Returns an instance of [BudgetSettingsResponseInterface](../src/Infrastructure/Budgets/BudgetSettingsResponseInterface.php).

## Accounts
The accounts for a budget.

### Account list
Returns all accounts.
```php
public function getAccounts(string $budgetId, ?int $lastKnowledgeOfServer = null): AccountsResponseInterface;
```
Returns an instance of [AccountsResponseInterface](../src/Infrastructure/Accounts/AccountsResponseInterface.php).

### Create a new account
Creates a new account. Requires an instance of [SaveAccount](../src/Model/Accounts/SaveAccount.php) describing the account to create.
```php
public function createAccount(string $budgetId, SaveAccount $account): AccountResponseInterface;
```
Returns an instance of [AccountResponseInterface](../src/Infrastructure/Accounts/AccountResponseInterface.php).

### Single account
Returns a single account.
```php
public function getAccount(string $budgetId, string $accountId): AccountResponseInterface;
```
Returns an instance of [AccountResponseInterface](../src/Infrastructure/Accounts/AccountResponseInterface.php).

## Categories
The categories for a budget.

### List categories
Returns all categories grouped by category group. Amounts (budgeted, activity, balance, etc.)
are specific to the current budget month (UTC).
```php
public function getCategories(string $budgetId, ?int $lastKnowledgeOfServer = null): CategoriesResponseInterface;
```
Returns an instance of [CategoriesResponseInterface](../src/Infrastructure/Categories/CategoriesResponseInterface.php).

### Single category
Returns a single category. Amounts (budgeted, activity, balance, etc.) are specific to the current 
budget month (UTC).
```php
public function getCategory(string $budgetId, string $categoryId): CategoryResponseInterface;
```
Returns an instance of [CategoryResponseInterface](../src/Infrastructure/Categories/CategoryResponseInterface.php).

### Single category for a specific budget month
Returns a single category for a specific budget month. Amounts (budgeted, activity, balance, etc.)
are specific to the current budget month (UTC).
```php
public function getCategoryForMonth(string $budgetId, string $month, string $categoryId): CategoryResponseInterface;
```
Returns an instance of [CategoryResponseInterface](../src/Infrastructure/Categories/CategoryResponseInterface.php).

### Update a category for a specific month
Update a category for a specific month. Only budgeted amount can be updated. Requires an instance of 
[SaveMonthCategory](../src/Model/Categories/SaveMonthCategory.php) describing the category to be updated. 
```php
public function updateCategoryForMonth(string $budgetId, string $month, string $categoryId, SaveMonthCategory $category): SaveCategoryResponseInterface;
```
Returns an instance of [SaveCategoryResponseInterface](../src/Infrastructure/Categories/SaveCategoryResponseInterface.php).

## Payees
The payees for a budget

### List payees
Returns all payees.
```php
public function getPayees(string $budgetId, ?int $lastKnowledgeOfServer = null): PayeesResponseInterface;
```
Returns an instance of [PayeesResponseInterface](../src/Infrastructure/Payees/PayeesResponseInterface.php).

### Single payee
Returns a single payee.
```php
public function getPayee(string $budgetId, string $payeeId): PayeeResponseInterface;
```
Returns an instance of [PayeeResponseInterface](../src/Infrastructure/Payees/PayeeResponseInterface.php).

## Payee Locations
When you enter a transaction and specify a payee on the YNAB mobile apps, the GPS coordinates for that location are 
stored, with your permission, so that the next time you are in the same place (like the Grocery store) we can pre-populate 
nearby payees for you! It’s handy and saves you time. This resource makes these locations available. Locations will not 
be available for all payees.

### List payee locations
Returns all payee locations.
```php
public function getPayeeLocations(string $budgetId): PayeeLocationsResponseInterface;
```
Returns an instance of [PayeeLocationsResponseInterface](../src/Infrastructure/Payees/PayeeLocationsResponseInterface.php).

### Single payee location
Returns a single payee location.
```php
public function getPayeeLocation(string $budgetId, string $payeeLocationId): PayeeLocationResponseInterface;
```
Returns an instance of [PayeeLocationResponseInterface](../src/Infrastructure/Payees/PayeeLocationResponseInterface.php).

### List locations for a payee
Returns all payee locations for a specified payee.
```php
public function getLocationsForPayee(string $budgetId, string $payeeId): PayeeLocationsResponseInterface;
```
Returns an instance of [PayeeLocationResponseInterface](../src/Infrastructure/Payees/PayeeLocationResponseInterface.php).

## Months
Each budget contains one or more months, which is where Ready to Assign, Age of Money and category 
(budgeted / activity / balances) amounts are available.

### List budget months
Returns all budget months.
```php
public function getMonths(string $budgetId, ?int $lastKnowledgeOfServer = null): MonthSummariesResponseInterface;
```
Returns an instance of [MonthSummariesResponseInterface](../src/Infrastructure/Months/MonthSummariesResponseInterface.php).

### Single budget month
Returns a single budget month.
```php
public function getMonth(string $budgetId, string $month): MonthDetailResponseInterface;
```
Returns an instance of [MonthDetailResponseInterface](../src/Infrastructure/Months/MonthDetailResponseInterface.php).

## Transactions
The transactions for a budget

### List transactions
Returns budget transactions.
```php
public function getTransactions(string $budgetId, ?string $sinceDate = null, ?string $type = null, ?int $lastKnowledgeOfServer = null): TransactionsResponseInterface;
```
Returns an instance of [TransactionsResponseInterface](../src/Infrastructure/Transactions/TransactionsResponseInterface.php).

### Create a single transaction
Creates a single transaction. Scheduled transactions cannot be created on this endpoint. Requires an instance of
[SaveTransaction](../src/Model/Transactions/SaveTransaction.php) describing the transaction to create.
```php
public function createTransaction(string $budgetId, SaveTransaction $transaction): SaveTransactionsResponseInterface;
```
Returns an instance of [SaveTransactionsResponseInterface](../src/Infrastructure/Transactions/SaveTransactionsResponseInterface.php).

### Create multiple transactions
Creates multiple transactions. Scheduled transactions cannot be created on this endpoint. Requires an array of instances of
[SaveTransaction](../src/Model/Transactions/SaveTransaction.php) describing the transactions to create.
```php
public function createTransactions(string $budgetId, array $transactions): SaveTransactionsResponseInterface;
```
Returns an instance of [SaveTransactionsResponseInterface](../src/Infrastructure/Transactions/SaveTransactionsResponseInterface.php).

### Update multiple transactions
Updates multiple transactions, by id or import_id. Requires an array of instances of
[UpdateTransaction](../src/Model/Transactions/UpdateTransaction.php) describing the transactions to update.
```php
public function updateTransactions(string $budgetId, array $transactions): SaveTransactionsResponseInterface;
```
Returns an instance of [SaveTransactionsResponseInterface](../src/Infrastructure/Transactions/SaveTransactionsResponseInterface.php).

### Import transactions
Imports available transactions on all linked accounts for the given budget. Linked accounts allow transactions
to be imported directly from a specified financial institution and this endpoint initiates that import. Sending
a request to this endpoint is the equivalent of clicking “Import” on each account in the web application or
tapping the “New Transactions” banner in the mobile applications. The response for this endpoint contains the
transaction ids that have been imported.
```php
public function importTransactions(string $budgetId): TransactionsImportResponseInterface;
```
Returns an instance of [TransactionsImportResponseInterface](../src/Infrastructure/Transactions/TransactionsImportResponseInterface.php).

### Single transaction
Returns a single transaction.
```php
public function getTransaction(string $budgetId, string $transactionId): TransactionResponseInterface;
```
Returns an instance of [TransactionResponseInterface](../src/Infrastructure/Transactions/TransactionResponseInterface.php).
 
### Update an existing transaction
Updates a single transaction.  Requires an instance of
[SaveTransaction](../src/Model/Transactions/SaveTransaction.php) describing the transaction to update.
```php
public function updateTransaction(string $budgetId, string $transactionId, SaveTransaction $transaction): TransactionResponseInterface;
```
Returns an instance of [TransactionResponseInterface](../src/Infrastructure/Transactions/TransactionResponseInterface.php).

### List account transactions
Returns all transactions for a specified account.
```php
public function getAccountTransactions(string $budgetId, string $accountId, ?string $sinceDate = null, ?string $type = null, ?int $lastKnowledgeOfServer = null): TransactionsResponseInterface;
```
Returns an instance of [TransactionsResponseInterface](../src/Infrastructure/Transactions/TransactionsResponseInterface.php).

### List category transactions
Returns all transactions for a specified category.
```php
public function getCategoryTransactions(string $budgetId, string $categoryId, ?string $sinceDate = null, ?string $type = null, ?int $lastKnowledgeOfServer = null): HybridTransactionsResponseInterface;
```
Returns an instance of [HybridTransactionsResponseInterface](../src/Infrastructure/Transactions/HybridTransactionsResponseInterface.php).

### List payee transactions
Returns all transactions for a specified payee.
```php
public function getPayeeTransactions(string $budgetId, string $payeeId, ?string $sinceDate = null, ?string $type = null, ?int $lastKnowledgeOfServer = null): HybridTransactionsResponseInterface;
```
Returns an instance of [HybridTransactionsResponseInterface](../src/Infrastructure/Transactions/HybridTransactionsResponseInterface.php).

## Scheduled transactions
The scheduled transactions for a budget

### List scheduled transactions
Returns all scheduled transactions.
```php
public function getScheduledTransactions(string $budgetId, ?int $lastKnowledgeOfServer = null): ScheduledTransactionsResponseInterface;
```
Returns an instance of [ScheduledTransactionsResponseInterface](../src/Infrastructure/Transactions/ScheduledTransactionsResponseInterface.php).

### Single scheduled transaction
Returns a single scheduled transaction.
```php
public function getScheduledTransaction(string $budgetId, string $scheduledTransactionId): ScheduledTransactionResponseInterface;
```
Returns an instance of [ScheduledTransactionResponseInterface](../src/Infrastructure/Transactions/ScheduledTransactionResponseInterface.php).
