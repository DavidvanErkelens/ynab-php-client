<?php

/**
 * @noinspection ALL
 */

declare(strict_types=1);

namespace YNAB\Tests\Infrastructure;

use Fig\Http\Message\StatusCodeInterface;
use GuzzleHttp\Client as HttpClient;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use YNAB\ConfigurationInterface;
use YNAB\Infrastructure\Budgets\BudgetDetailResponse;
use YNAB\Infrastructure\Budgets\BudgetSettingsResponse;
use YNAB\Infrastructure\Budgets\BudgetSummaryResponse;
use YNAB\Infrastructure\Client;
use YNAB\Infrastructure\Converters\TypeConverter;
use YNAB\Infrastructure\Http\RequestBuilder;
use YNAB\Infrastructure\Http\UrlBuilder;
use YNAB\Infrastructure\User\UserResponse;

/**
 * @psalm-suppress MissingThrowsDocblock
 */
class ClientTest extends TestCase
{
    use ProphecyTrait;

    protected const RATE_LIMIT = 15;

    private const USER_ID = '3dce44e8-a15b-411a-a661-d7fa951306a8';
    private const BUDGET_ID = 'f5f3fc18-82f3-41b5-bf96-00332640b1b0';
    private const ACCOUNT_ID = '164199d0-644e-4e4d-b1fd-5343d1f45240';
    private const CATEGORY_ID = 'c6d5d97a-79e8-45c7-8d9b-814d879ffb0a';
    private const PAYEE_ID = 'ae723430-f8a1-4aad-be92-2eab4c3676ff';
    private const PAYEE_LOCATION_ID = '9cb2a821-d76b-40ac-825a-3ec78c4562d2';
    private const PAYEE_LOCATION_PAYEE_ID = '2a1a7bdd-6302-4e3c-bc91-6dce335b708f';
    private const SCHEDULED_TRANSACTION_ID = 'a01976bf-0db3-4ed5-bc30-7544cc5b4ea1';
    private const TRANSACTION_ID = 'b7aa8ba2-6a33-413b-9271-cc8c08c6bc03';

    protected ObjectProphecy $httpClient;
    protected ObjectProphecy $configuration;
    protected ObjectProphecy $cache;

    protected Client $sut;

    public function setUp(): void
    {
        $this->httpClient = $this->prophesize(HttpClient::class);
        $this->configuration = $this->prophesize(ConfigurationInterface::class);
        $this->cache = $this->prophesize(CacheItemPoolInterface::class);

        $self = $this;

        $this->httpClient
            ->sendRequest(Argument::type('Psr\Http\Message\RequestInterface'))
            ->will(function (array $args) use ($self) {
                /** @var RequestInterface */
                $request = $args[0];

                $contentFile = implode('/', [
                    __DIR__,
                    'ClientResponses',
                    $request->getMethod(),
                    str_replace(['/', '?', '='], '-', (string) $request->getUri()) . '.json'
                ]);

                $streamMock = $self->prophesize(StreamInterface::class);
                $streamMock->getContents()->willReturn(file_get_contents($contentFile));

                $responseMock = $self->prophesize(ResponseInterface::class);
                $responseMock->getStatusCode()->willReturn(StatusCodeInterface::STATUS_OK);
                $responseMock->getBody()->willReturn($streamMock->reveal());
                $responseMock->getHeaderLine('X-Rate-Limit')->willReturn(self::RATE_LIMIT . '/200');
                return $responseMock->reveal();
            });

        $this->configuration
            ->isCachingDisabled()
            ->willReturn(true);

        $this->configuration
            ->getCacheItemPool()
            ->willReturn($this->cache->reveal());

        $this->sut = new Client(
            $this->httpClient->reveal(),
            new UrlBuilder(),
            new RequestBuilder(),
            new TypeConverter(),
            $this->configuration->reveal()
        );
    }

    public function testGetUserReturnsUserResponseObject(): void
    {
        $response = $this->sut->getUser();

        $this->assertEquals(UserResponse::class, get_class($response));
        $this->assertEquals(self::USER_ID, $response->getData()->getUser()->getId());
    }

    public function testGetBudgetsReturnsBudgetSummaryResponseObject(): void
    {
        $response = $this->sut->getBudgets();

        $this->assertEquals(BudgetSummaryResponse::class, get_class($response));
        $this->assertCount(1, $response->getData()->getBudgets());
        $this->assertEquals(self::BUDGET_ID, $response->getData()->getBudgets()[0]->getId());
    }

    public function testGetBudgetReturnsBudgetDetailResponseObject(): void
    {
        $response = $this->sut->getBudget(self::BUDGET_ID);

        $this->assertEquals(BudgetDetailResponse::class, get_class($response));
        $this->assertEquals(self::BUDGET_ID, $response->getData()->getBudget()->getId());
    }

    public function testGetBudgetSettingsReturnsBudgetSettingsResponseObject(): void
    {
        $response = $this->sut->getBudgetSettings(self::BUDGET_ID);

        $this->assertEquals(BudgetSettingsResponse::class, get_class($response));
    }
}
