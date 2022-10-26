<?php

declare(strict_types=1);

namespace Engineered\Orders\Domain;

use Engineered\HttpClient\HttpClientFacadeInterface;

final class Orders
{
    public const CUSTOMERS_ORDERS_ENDPOINT = 'customers/%s/orders';

    public function __construct(
        private HttpClientFacadeInterface $httpClient
    ) {
    }

    public function get(string $customerId, string $bearerToken): array
    {
        return $this->httpClient->getProtected(
            sprintf(self::CUSTOMERS_ORDERS_ENDPOINT, $customerId),
            $bearerToken
        );
    }
}
