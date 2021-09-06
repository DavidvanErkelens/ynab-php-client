# PHP client library for YNAB
![build status](https://github.com/DavidvanErkelens/ynab-php-client/actions/workflows/ci.yml/badge.svg)

This is a PHP client implementation for the _You Need A Budget_ (YNAB) API. 

## Installation
### Using composer
_Not yet available, will be added soon_

### Manual installation
Download the contents of this repository, and include the `vendor/autoloader.php` file.

## Basic usage
In order to use this library, you need an API key. See the [YNAB API documentation](https://api.youneedabudget.com/#authentication)
for more information about this.

```php
// Create a basic configuration
// Returns an instance of ConfigurationInterface
$config = YNAB::createConfiguration('your api token');

// Create a client object
// Returns an instance of ClientInterface
$client = YNAB::createClient($config);
```

Via the `$client` object, all non-deprecated methods available on the YNAB API can be accessed. See [this](docs/client-methods.md)
document for all available methods on the client object.

## Server knowledge
Several endpoints can be provided with a number, indicating the [last server knowledge state](https://api.youneedabudget.com/#deltas). 
If available, the server knowledge state is included in the response object.

## Error handling
If a request to the API returns an unexpected status code, a [YnabErrorException](src/Exceptions/YnabErrorException.php)
will be thrown. In this exception, an instance of [ErrorResponseInterface](src/Infrastructure/Errors/ErrorResponseInterface.php)
can be found, which contains the error reported by the YNAB API.

## Rate limiting
YNAB's API is rate limited to 200 requests per access token per hour. The current usage is returned by the YNAB API in 
a header, which you can fetch via the client object after a call to the API has been performed. 

```php
$config = YNAB::createConfiguration('your api token');
$client = YNAB::createClient($config);

// your logic here

$rateLimit = $client->getRateLimit();
```

This function will return `null` if no requests have been made yet. The returned value of this function is the number of 
requests made towards the rate limit as reported at the moment of the last response from the YNAB API.

## Caching
This library supports caching for all GET requests. By default, a simple in-memory cache will be used with a timeout
of 5 minutes. If you want to disable caching, you can do so via the configuration object.

```php
$config = YNAB::createConfiguration('your api token');
$config->setCachingDisabled(true);
```

In the same way, you can configure the timeout for the cache.

```php
$config = YNAB::createConfiguration('your api token');
$config->setCacheTimeout(new DateInterval("PT10M"));
```

You can also call the `setCacheTimeout` function with `null` to disable expiration of cached items.

It is also possible to provide your own caching adapter that implements the [PSR-6](https://www.php-fig.org/psr/psr-6/) 
`CacheItemPoolInterface`.

```php
$config = YNAB::createConfiguration('your api token');
$config->setCacheItemPool(new MyCache());
```

## Contributing
This library is still an active work in progress by the author. Pull requests are appreciated, but the library can 
undergo structural changes at any moment in time.

## Authors
- [DavidvanErkelens](https://github.com/DavidvanErkelens)

## License
[MIT](https://choosealicense.com/licenses/mit/)
