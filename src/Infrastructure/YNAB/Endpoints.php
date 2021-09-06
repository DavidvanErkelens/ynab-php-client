<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\YNAB;

class Endpoints
{
    public const BASE_URL = 'https://api.youneedabudget.com/v1/';

    public const USER_ENDPOINT = 'user';
    public const BUDGETS_ENDPOINT = 'budgets';
    public const SINGLE_BUDGET_ENDPOINT = 'budgets/%s';
    public const BUDGET_SETTINGS_ENDPOINT = 'budgets/%s/settings';

    public const BUDGET_ACCOUNTS_ENDPOINT = 'budgets/%s/accounts';
    public const BUDGET_SINGLE_ACCOUNT_ENDPOINT = 'budgets/%s/accounts/%s';

    public const BUDGET_CATEGORIES_ENDPOINT = 'budgets/%s/categories';
    public const SINGLE_CATEGORY_ENDPOINT = 'budgets/%s/categories/%s';
    public const SINGLE_CATEGORY_FOR_MONTH_ENDPOINT = 'budgets/%s/months/%s/categories/%s';

    public const BUDGET_PAYEES_ENDPOINT = 'budgets/%s/payees';
    public const BUDGET_SINGLE_PAYEE_ENDPOINT = 'budgets/%s/payees/%s';

    public const BUDGET_PAYEE_LOCATIONS_ENDPOINT = 'budgets/%s/payee_locations';
    public const SINGLE_PAYEE_LOCATION_ENDPOINT = 'budgets/%s/payee_locations/%s';
    public const LOCATIONS_FOR_PAYEE_ENDPOINT = 'budgets/%s/payees/%s/payee_locations';

    public const BUDGET_MONTHS_ENDPOINT = 'budgets/%s/months';
    public const SINGLE_MONTH_ENDPOINT = 'budgets/%s/months/%s';

    public const BUDGET_TRANSACTIONS_ENDPOINT = 'budgets/%s/transactions';
    public const BUDGET_TRANSACTIONS_IMPORT_ENDPOINT = 'budgets/%s/transactions/import';
    public const SINGLE_TRANSACTION_ENDPOINT = 'budgets/%s/transactions/%s';

    public const ACCOUNT_TRANSACTIONS_ENDPOINT = 'budgets/%s/accounts/%s/transactions';
    public const CATEGORY_TRANSACTIONS_ENDPOINT = 'budgets/%s/categories/%s/transactions';
    public const PAYEE_TRANSACTIONS_ENDPOINT = 'budgets/%s/payees/%s/transactions';

    public const BUDGET_SCHEDULED_TRANSACTIONS_ENDPOINT = 'budgets/%s/scheduled_transactions';
    public const BUDGET_SCHEDULED_TRANSACTION_ENDPOINT = 'budgets/%s/scheduled_transactions/%s';
}
