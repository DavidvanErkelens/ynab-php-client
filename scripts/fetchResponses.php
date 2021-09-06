<?php

/**
 * This script is intended to generate all GET responses from the API for testing purposes, by querying a test budget
 * on the YNAB API. This script can be executed after setting the right settings in config.json, which you can copy
 * from config.json.dist.
 */

declare(strict_types=1);

require_once '../vendor/autoload.php';

$outputDir = '../tests/Infrastructure/ClientResponses/GET';

$settings = json_decode(file_get_contents('config.json'), true);

$apiKey = $settings['apiKey'];
$budgetId = $settings['budgetId'];
$accountId = $settings['accountId'];
$categoryId = $settings['categoryId'];
$payeeId = $settings['payeeId'];
$payeeLocationId = $settings['payeeLocationId'];
$payeeLocationPayeeId = $settings['payeeLocationPayeeId'];
$transactionId = $settings['transactionId'];
$scheduledTransactionId = $settings['scheduledTransactionId'];
$month = $settings['month'];

$urls = [
    'user',
    'budgets',
    'budgets?include_accounts=true',
    "budgets/$budgetId",
    "budgets/$budgetId/settings",
    "budgets/$budgetId/accounts",
    "budgets/$budgetId/accounts/$accountId",
    "budgets/$budgetId/categories",
    "budgets/$budgetId/categories/$categoryId",
    "budgets/$budgetId/months/$month/categories/$categoryId",
    "budgets/$budgetId/payees",
    "budgets/$budgetId/payees/$payeeId",
    "budgets/$budgetId/payee_locations",
    "budgets/$budgetId/payee_locations/$payeeLocationId",
    "budgets/$budgetId/payees/$payeeLocationPayeeId/payee_locations",
    "budgets/$budgetId/months",
    "budgets/$budgetId/months/$month",
    "budgets/$budgetId/transactions",
    "budgets/$budgetId/transactions/$transactionId",
    "budgets/$budgetId/accounts/$accountId/transactions",
    "budgets/$budgetId/categories/$categoryId/transactions",
    "budgets/$budgetId/payees/$payeeId/transactions",
    "budgets/$budgetId/scheduled_transactions",
    "budgets/$budgetId/scheduled_transactions/$scheduledTransactionId",
];

$client = new GuzzleHttp\Client([
    'base_uri' => 'https://api.youneedabudget.com/v1/'
]);

foreach ($urls as $url) {
    echo "Getting $url...\n";

    $response = $client->request('GET', $url, [
        'headers' => [
            'Authorization' => "Bearer $apiKey",
        ],
    ]);
    $data = $response->getBody()->getContents();
    $prettyData = json_encode(json_decode($data), JSON_PRETTY_PRINT);
    $filename = str_replace(['?', '/', '='], '-', $url);
    file_put_contents("$outputDir/$filename.json", $prettyData);
}
