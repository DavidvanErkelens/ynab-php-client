<?php

namespace YNAB\Infrastructure\Middlewares;

use InvalidArgumentException;
use Psr\Http\Message\RequestInterface;
use YNAB\ConfigurationInterface;

class AuthorizationHeaderMiddleware
{
    /**
     * @throws InvalidArgumentException
     */
    public static function addHeader(ConfigurationInterface $configuration, RequestInterface $request): RequestInterface
    {
        $headerContent = "Bearer {$configuration->getToken()}";
        return $request->withHeader('Authorization', $headerContent);
    }
}
