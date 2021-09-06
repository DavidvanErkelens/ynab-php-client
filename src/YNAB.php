<?php

declare(strict_types=1);

namespace YNAB;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Http\Message\RequestInterface;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use YNAB\Infrastructure\Converters\TypeConverter;
use YNAB\Infrastructure\Http\RequestBuilder;
use YNAB\Infrastructure\Http\UrlBuilder;
use YNAB\Infrastructure\Middlewares\AuthorizationHeaderMiddleware;
use YNAB\Infrastructure\Client;
use YNAB\Infrastructure\Configuration;
use YNAB\Infrastructure\YNAB\Endpoints;

class YNAB
{
    /**
     * @param string $token
     * @return ConfigurationInterface
     */
    public static function createConfiguration(string $token): ConfigurationInterface
    {
        return new Configuration($token);
    }

    /**
     * @param ConfigurationInterface $configuration
     * @return ClientInterface
     */
    public static function createClient(ConfigurationInterface $configuration): ClientInterface
    {
        $stack = new HandlerStack();
        $stack->setHandler(new CurlHandler());

        $stack->push(Middleware::mapRequest(
            fn (RequestInterface $request) => AuthorizationHeaderMiddleware::addHeader($configuration, $request)
        ));

        $httpClient = new HttpClient([
            'base_uri' => Endpoints::BASE_URL,
            'handler' => $stack
        ]);

        return new Client(
            $httpClient,
            new UrlBuilder(),
            new RequestBuilder(),
            new TypeConverter(),
            $configuration
        );
    }
}
