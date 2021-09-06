<?php

declare(strict_types=1);

namespace YNAB\Infrastructure;

use Fig\Http\Message\StatusCodeInterface;
use GuzzleHttp\Client as HttpClient;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Cache\InvalidArgumentException;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;
use YNAB\ClientInterface;
use YNAB\ConfigurationInterface;
use YNAB\Exceptions\ApiClientException;
use YNAB\Exceptions\YnabErrorException;
use YNAB\Infrastructure\Accounts\AccountResponse;
use YNAB\Infrastructure\Accounts\AccountsResponse;
use YNAB\Infrastructure\Accounts\SaveAccountWrapper;
use YNAB\Infrastructure\Budgets\BudgetDetailResponse;
use YNAB\Infrastructure\Budgets\BudgetSettingsResponse;
use YNAB\Infrastructure\Budgets\BudgetSummaryResponse;
use YNAB\Infrastructure\Categories\CategoriesResponse;
use YNAB\Infrastructure\Categories\CategoryResponse;
use YNAB\Infrastructure\Categories\SaveCategoryResponse;
use YNAB\Infrastructure\Categories\SaveMonthCategoryWrapper;
use YNAB\Infrastructure\Converters\TypeConverterInterface;
use YNAB\Infrastructure\Errors\ErrorResponse;
use YNAB\Infrastructure\Http\RequestBuilderInterface;
use YNAB\Infrastructure\Http\UrlBuilderInterface;
use YNAB\Infrastructure\Months\MonthDetailResponse;
use YNAB\Infrastructure\Months\MonthSummariesResponse;
use YNAB\Infrastructure\Payees\PayeeLocationResponse;
use YNAB\Infrastructure\Payees\PayeeLocationsResponse;
use YNAB\Infrastructure\Payees\PayeeResponse;
use YNAB\Infrastructure\Payees\PayeesResponse;
use YNAB\Infrastructure\Transactions\TransactionResponse;
use YNAB\Infrastructure\Transactions\TransactionsResponse;
use YNAB\Infrastructure\Transactions\HybridTransactionsResponse;
use YNAB\Infrastructure\Transactions\TransactionsImportResponse;
use YNAB\Infrastructure\Transactions\SaveTransactionsResponse;
use YNAB\Infrastructure\Transactions\SaveTransactionsWrapper;
use YNAB\Infrastructure\Transactions\ScheduledTransactionResponse;
use YNAB\Infrastructure\Transactions\ScheduledTransactionsResponse;
use YNAB\Infrastructure\Transactions\UpdateTransactionsWrapper;
use YNAB\Infrastructure\User\UserResponse;
use YNAB\Infrastructure\YNAB\Endpoints;
use YNAB\Model\Accounts\SaveAccount;
use YNAB\Model\Categories\SaveMonthCategory;
use YNAB\Model\Transactions\SaveTransaction;
use YNAB\Model\Transactions\UpdateTransaction;

class Client implements ClientInterface
{
    private const LAST_SERVER_KNOWLEDGE_KEY = 'last_knowledge_of_server';
    private const BUDGETS_INCLUDE_ACCOUNTS_PARAM = 'include_accounts';

    private ?int $rateLimit = null;

    private HttpClient $client;
    private UrlBuilderInterface $urlBuilder;
    private RequestBuilderInterface $requestBuilder;
    private TypeConverterInterface $typeConverter;
    private ConfigurationInterface $configuration;
    private CacheItemPoolInterface $cache;

    public function __construct(
        HttpClient              $client,
        UrlBuilderInterface     $urlBuilder,
        RequestBuilderInterface $requestBuilder,
        TypeConverterInterface  $typeConverter,
        ConfigurationInterface  $configuration
    ) {
        $this->client = $client;
        $this->urlBuilder = $urlBuilder;
        $this->requestBuilder = $requestBuilder;
        $this->typeConverter = $typeConverter;
        $this->configuration = $configuration;
        $this->cache = $configuration->getCacheItemPool();
    }

    /**
     * @inheritDoc
     */
    public function getRateLimit(): ?int
    {
        return $this->rateLimit;
    }

    /**
     * @inheritDoc
     */
    public function getUser(): UserResponse
    {
        $url = $this->urlBuilder->buildUri(Endpoints::USER_ENDPOINT);
        $request = $this->requestBuilder->buildGetRequest($url);

        $contents = $this->get($request);

        return UserResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function getBudgets(bool $includeAccounts = false): BudgetSummaryResponse
    {
        $url = $this->urlBuilder->buildUri(Endpoints::BUDGETS_ENDPOINT, [], [
            self::BUDGETS_INCLUDE_ACCOUNTS_PARAM => $this->typeConverter->boolToString($includeAccounts)
        ]);
        $request = $this->requestBuilder->buildGetRequest($url);

        $contents = $this->get($request);

        return BudgetSummaryResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function getBudget(string $budgetId, int $lastKnowledgeOfServer = null): BudgetDetailResponse
    {
        $url = $this->urlBuilder->buildUri(Endpoints::SINGLE_BUDGET_ENDPOINT, [$budgetId], [
            self::LAST_SERVER_KNOWLEDGE_KEY => $lastKnowledgeOfServer
        ]);

        $request = $this->requestBuilder->buildGetRequest($url);

        $contents = $this->get($request);

        return BudgetDetailResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function getBudgetSettings(string $budgetId): BudgetSettingsResponse
    {
        $url = $this->urlBuilder->buildUri(Endpoints::BUDGET_SETTINGS_ENDPOINT, [$budgetId]);
        $request = $this->requestBuilder->buildGetRequest($url);

        $contents = $this->get($request);

        return BudgetSettingsResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function getAccounts(string $budgetId, ?int $lastKnowledgeOfServer = null): AccountsResponse
    {
        $url = $this->urlBuilder->buildUri(Endpoints::BUDGET_ACCOUNTS_ENDPOINT, [$budgetId], [
            self::LAST_SERVER_KNOWLEDGE_KEY => $lastKnowledgeOfServer
        ]);
        $request = $this->requestBuilder->buildGetRequest($url);

        $contents = $this->get($request);

        return AccountsResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function createAccount(string $budgetId, SaveAccount $account): AccountResponse
    {
        $url = $this->urlBuilder->buildUri(Endpoints::BUDGET_ACCOUNTS_ENDPOINT, [$budgetId]);
        $request = $this->requestBuilder->buildPostRequest($url, SaveAccountWrapper::wrap($account)->serialize());

        $contents = $this->post($request);

        return AccountResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function getAccount(string $budgetId, string $accountId): AccountResponse
    {
        $url = $this->urlBuilder->buildUri(Endpoints::BUDGET_SINGLE_ACCOUNT_ENDPOINT, [$budgetId, $accountId]);
        $request = $this->requestBuilder->buildGetRequest($url);

        $contents = $this->get($request);

        return AccountResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function getCategories(string $budgetId, ?int $lastKnowledgeOfServer = null): CategoriesResponse
    {
        $url = $this->urlBuilder->buildUri(Endpoints::BUDGET_CATEGORIES_ENDPOINT, [$budgetId], [
            self::LAST_SERVER_KNOWLEDGE_KEY => $lastKnowledgeOfServer
        ]);
        $request = $this->requestBuilder->buildGetRequest($url);

        $contents = $this->get($request);

        return CategoriesResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function getCategory(string $budgetId, string $categoryId): CategoryResponse
    {
        $url = $this->urlBuilder->buildUri(Endpoints::SINGLE_CATEGORY_ENDPOINT, [$budgetId, $categoryId]);
        $request = $this->requestBuilder->buildGetRequest($url);

        $contents = $this->get($request);

        return CategoryResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function getCategoryForMonth(string $budgetId, string $month, string $categoryId): CategoryResponse
    {
        $url = $this->urlBuilder->buildUri(
            Endpoints::SINGLE_CATEGORY_FOR_MONTH_ENDPOINT,
            [$budgetId, $month, $categoryId]
        );
        $request = $this->requestBuilder->buildGetRequest($url);

        $contents = $this->get($request);

        return CategoryResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function updateCategoryForMonth(
        string $budgetId,
        string $month,
        string $categoryId,
        SaveMonthCategory $category
    ): SaveCategoryResponse {
        $url = $this->urlBuilder->buildUri(
            Endpoints::SINGLE_CATEGORY_FOR_MONTH_ENDPOINT,
            [$budgetId, $month, $categoryId]
        );
        $request =
            $this->requestBuilder->buildPatchRequest($url, SaveMonthCategoryWrapper::wrap($category)->serialize());

        $contents = $this->patch($request);

        return CategoryResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function getPayees(string $budgetId, ?int $lastKnowledgeOfServer = null): PayeesResponse
    {
        $url = $this->urlBuilder->buildUri(Endpoints::BUDGET_PAYEES_ENDPOINT, [$budgetId]);
        $request = $this->requestBuilder->buildGetRequest($url);

        $contents = $this->get($request);

        return PayeesResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function getPayee(string $budgetId, string $payeeId): PayeeResponse
    {
        $url = $this->urlBuilder->buildUri(Endpoints::BUDGET_SINGLE_PAYEE_ENDPOINT, [$budgetId, $payeeId]);
        $request = $this->requestBuilder->buildGetRequest($url);

        $contents = $this->get($request);

        return PayeeResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function getPayeeLocations(string $budgetId): PayeeLocationsResponse
    {
        $url = $this->urlBuilder->buildUri(Endpoints::BUDGET_PAYEE_LOCATIONS_ENDPOINT, [$budgetId]);
        $request = $this->requestBuilder->buildGetRequest($url);

        $contents = $this->get($request);

        return PayeeLocationsResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function getPayeeLocation(string $budgetId, string $payeeLocationId): PayeeLocationResponse
    {
        $url = $this->urlBuilder->buildUri(Endpoints::SINGLE_PAYEE_LOCATION_ENDPOINT, [$budgetId, $payeeLocationId]);
        $request = $this->requestBuilder->buildGetRequest($url);

        $contents = $this->get($request);

        return PayeeLocationResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function getLocationsForPayee(string $budgetId, string $payeeId): PayeeLocationsResponse
    {
        $url = $this->urlBuilder->buildUri(Endpoints::LOCATIONS_FOR_PAYEE_ENDPOINT, [$budgetId, $payeeId]);
        $request = $this->requestBuilder->buildGetRequest($url);

        $contents = $this->get($request);

        return PayeeLocationsResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function getMonths(string $budgetId, ?int $lastKnowledgeOfServer = null): MonthSummariesResponse
    {
        $url = $this->urlBuilder->buildUri(Endpoints::BUDGET_MONTHS_ENDPOINT, [$budgetId], [
            self::LAST_SERVER_KNOWLEDGE_KEY => $lastKnowledgeOfServer
        ]);
        $request = $this->requestBuilder->buildGetRequest($url);

        $contents = $this->get($request);

        return MonthSummariesResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function getMonth(string $budgetId, string $month): MonthDetailResponse
    {
        $url = $this->urlBuilder->buildUri(Endpoints::SINGLE_MONTH_ENDPOINT, [$budgetId, $month]);
        $request = $this->requestBuilder->buildGetRequest($url);

        $contents = $this->get($request);

        return MonthDetailResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function getTransactions(
        string $budgetId,
        ?string $sinceDate = null,
        ?string $type = null,
        ?int $lastKnowledgeOfServer = null
    ): TransactionsResponse {
        $url = $this->urlBuilder->buildUri(Endpoints::BUDGET_TRANSACTIONS_ENDPOINT, [$budgetId], [
            'since_date' => $sinceDate,
            'type' => $type,
            self::LAST_SERVER_KNOWLEDGE_KEY => $lastKnowledgeOfServer
        ]);
        $request = $this->requestBuilder->buildGetRequest($url);

        $contents = $this->get($request);

        return TransactionsResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function createTransaction(string $budgetId, SaveTransaction $transaction): SaveTransactionsResponse
    {
        $url = $this->urlBuilder->buildUri(Endpoints::BUDGET_TRANSACTIONS_ENDPOINT, [$budgetId]);
        $request = $this->requestBuilder->buildPostRequest(
            $url,
            SaveTransactionsWrapper::wrapSingle($transaction)->serialize()
        );

        $contents = $this->post($request);

        return SaveTransactionsResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function createTransactions(string $budgetId, array $transactions): SaveTransactionsResponse
    {
        $url = $this->urlBuilder->buildUri(Endpoints::BUDGET_TRANSACTIONS_ENDPOINT, [$budgetId]);
        $request = $this->requestBuilder->buildPostRequest(
            $url,
            SaveTransactionsWrapper::wrapMultiple($transactions)->serialize()
        );

        $contents = $this->post($request);

        return SaveTransactionsResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function updateTransactions(string $budgetId, array $transactions): SaveTransactionsResponse
    {
        $url = $this->urlBuilder->buildUri(Endpoints::BUDGET_TRANSACTIONS_ENDPOINT, [$budgetId]);
        $request = $this->requestBuilder->buildPatchRequest(
            $url,
            (new UpdateTransactionsWrapper($transactions))->serialize()
        );

        $contents = $this->patch($request);

        return SaveTransactionsResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function importTransactions(string $budgetId): TransactionsImportResponse
    {
        $url = $this->urlBuilder->buildUri(Endpoints::BUDGET_TRANSACTIONS_IMPORT_ENDPOINT, [$budgetId]);
        $request = $this->requestBuilder->buildPostRequest($url);

        $contents = $this->post($request);

        return TransactionsImportResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function getTransaction(string $budgetId, string $transactionId): TransactionResponse
    {
        $url = $this->urlBuilder->buildUri(Endpoints::SINGLE_TRANSACTION_ENDPOINT, [$budgetId, $transactionId]);
        $request = $this->requestBuilder->buildGetRequest($url);

        $contents = $this->get($request);

        return TransactionResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function updateTransaction(
        string $budgetId,
        string $transactionId,
        SaveTransaction $transaction
    ): TransactionResponse {
        $url = $this->urlBuilder->buildUri(Endpoints::SINGLE_TRANSACTION_ENDPOINT, [$budgetId, $transactionId]);
        $request = $this->requestBuilder->buildPutRequest($url);

        $contents = $this->put($request);

        return TransactionResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function getAccountTransactions(
        string $budgetId,
        string $accountId,
        ?string $sinceDate = null,
        ?string $type = null,
        ?int $lastKnowledgeOfServer = null
    ): TransactionsResponse {
        $url = $this->urlBuilder->buildUri(Endpoints::ACCOUNT_TRANSACTIONS_ENDPOINT, [$budgetId, $accountId], [
            'since_date' => $sinceDate,
            'type' => $type,
            self::LAST_SERVER_KNOWLEDGE_KEY => $lastKnowledgeOfServer
        ]);
        $request = $this->requestBuilder->buildGetRequest($url);

        $contents = $this->get($request);

        return TransactionsResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function getCategoryTransactions(
        string $budgetId,
        string $categoryId,
        ?string $sinceDate = null,
        ?string $type = null,
        ?int $lastKnowledgeOfServer = null
    ): HybridTransactionsResponse {
        $url = $this->urlBuilder->buildUri(Endpoints::CATEGORY_TRANSACTIONS_ENDPOINT, [$budgetId, $categoryId], [
            'since_date' => $sinceDate,
            'type' => $type,
            self::LAST_SERVER_KNOWLEDGE_KEY => $lastKnowledgeOfServer
        ]);
        $request = $this->requestBuilder->buildGetRequest($url);

        $contents = $this->get($request);

        return HybridTransactionsResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function getPayeeTransactions(
        string $budgetId,
        string $payeeId,
        ?string $sinceDate = null,
        ?string $type = null,
        ?int $lastKnowledgeOfServer = null
    ): HybridTransactionsResponse {
        $url = $this->urlBuilder->buildUri(Endpoints::PAYEE_TRANSACTIONS_ENDPOINT, [$budgetId, $payeeId], [
            'since_date' => $sinceDate,
            'type' => $type,
            self::LAST_SERVER_KNOWLEDGE_KEY => $lastKnowledgeOfServer
        ]);
        $request = $this->requestBuilder->buildGetRequest($url);

        $contents = $this->get($request);

        return HybridTransactionsResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function getScheduledTransactions(
        string $budgetId,
        ?int $lastKnowledgeOfServer = null
    ): ScheduledTransactionsResponse {
        $url = $this->urlBuilder->buildUri(Endpoints::BUDGET_SCHEDULED_TRANSACTIONS_ENDPOINT, [$budgetId], [
            self::LAST_SERVER_KNOWLEDGE_KEY => $lastKnowledgeOfServer
        ]);
        $request = $this->requestBuilder->buildGetRequest($url);

        $contents = $this->get($request);

        return ScheduledTransactionsResponse::deserialize($contents);
    }

    /**
     * @inheritDoc
     */
    public function getScheduledTransaction(
        string $budgetId,
        string $scheduledTransactionId
    ): ScheduledTransactionResponse {
        $url = $this->urlBuilder->buildUri(
            Endpoints::BUDGET_SCHEDULED_TRANSACTION_ENDPOINT,
            [$budgetId, $scheduledTransactionId]
        );
        $request = $this->requestBuilder->buildGetRequest($url);

        $contents = $this->get($request);

        return ScheduledTransactionResponse::deserialize($contents);
    }

    /**
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    private function get(RequestInterface $request): string
    {
        if ($this->configuration->isCachingDisabled()) {
            $response = $this->processRequest($request);
            return $response->getBody()->getContents();
        }

        try {
            $cacheKey = str_replace('/', '-', (string) $request->getUri());
            $cacheItem = $this->cache->getItem($cacheKey);

            if ($cacheItem->isHit()) {
                return $cacheItem->get();
            }

            $response = $this->processRequest($request);
            $contents = $response->getBody()->getContents();

            $cacheItem->set($contents);

            if (($timeout = $this->configuration->getCacheTimeout()) !== null) {
                $cacheItem->expiresAfter($timeout);
            }
        } catch (InvalidArgumentException) {
            $response = $this->processRequest($request);
            $contents = $response->getBody()->getContents();
        }

        return $contents;
    }

    /**
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    private function post(RequestInterface $request): string
    {
        $response = $this->processRequest($request, StatusCodeInterface::STATUS_CREATED);
        return $response->getBody()->getContents();
    }

    /**
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    private function patch(RequestInterface $request): string
    {
        $response = $this->processRequest($request, 209);
        return $response->getBody()->getContents();
    }

    /**
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    private function put(RequestInterface $request): string
    {
        $response = $this->processRequest($request);
        return $response->getBody()->getContents();
    }

    /**
     * @throws ApiClientException
     * @throws YnabErrorException
     * @throws RuntimeException
     */
    private function processRequest(
        RequestInterface $request,
        int $expectedStatusCode = StatusCodeInterface::STATUS_OK
    ): ResponseInterface {
        try {
            $response = $this->client->sendRequest($request);
        } catch (ClientExceptionInterface $exception) {
            throw new ApiClientException("", $exception);
        }

        $rateLimitHeader = $response->getHeaderLine('X-Rate-Limit');
        if (!empty($rateLimitHeader)) {
            $this->rateLimit = (int) explode('/', $rateLimitHeader)[0];
        }

        if ($response->getStatusCode() !== $expectedStatusCode) {
            $errorResponse = ErrorResponse::deserialize($response->getBody()->getContents());
            throw new YnabErrorException($errorResponse->getError());
        }

        return $response;
    }
}
