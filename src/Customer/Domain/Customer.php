<?php

declare(strict_types=1);

namespace Engineered\Customer\Domain;

use Engineered\HttpClient\HttpClientFacadeInterface;

final class Customer
{
    public const CUSTOMERS_ENDPOINT = 'customers';

    public function __construct(
        private HttpClientFacadeInterface $httpClient
    ) {
    }

    public function get(string $bearerToken): array
    {
        return $this->httpClient->getProtected(self::CUSTOMERS_ENDPOINT, $bearerToken);
    }
}
