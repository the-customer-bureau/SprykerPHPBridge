<?php

declare(strict_types=1);

namespace Engineered\Resource\Domain;

use Engineered\HttpClient\HttpClientFacadeInterface;

class ConcreteProduct
{
    private const CONCRETE_PRODUCTS_ENDPOINT = 'concrete-products';

    public function __construct(
        private HttpClientFacadeInterface $httpClient
    ) {
    }

    public function get(string $sku): array
    {
        return $this->httpClient->get(self::CONCRETE_PRODUCTS_ENDPOINT . '/' . $sku);
    }
}
