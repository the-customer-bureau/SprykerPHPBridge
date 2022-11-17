<?php

declare(strict_types=1);

namespace Engineered\Customer\Domain;

use Engineered\HttpClient\HttpClientFacadeInterface;
use Exception;

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

    public function getId(string $bearerToken): string
    {
        $response = $this->get($bearerToken);

        return $response['data'][0]['id'];
    }

    public function getAttributes(string $bearerToken): array
    {
        $response = $this->get($bearerToken);

        return $response['data'][0]['attributes'];
    }

    /**
     * @throws Exception
     */
    public function generateCustomerUniqueId(): string
    {
        $bytes = random_bytes(15);

        return uniqid(bin2hex($bytes), true);
    }
}
