<?php

declare(strict_types=1);

namespace Engineered\ConcreteProduct\Domain;

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

    public function getReviewCount(string $sku): int
    {
        $response = $this->get($sku);

        return $response['data']['attributes']['reviewCount'];
    }

    public function getName(string $sku): string
    {
        $response = $this->get($sku);

        return $response['data']['attributes']['name'];
    }

    public function getDescription(string $sku): string
    {
        $response = $this->get($sku);

        return $response['data']['attributes']['description'];
    }

    public function getMetaTitle(string $sku): string
    {
        $response = $this->get($sku);

        return $response['data']['attributes']['metaTitle'];
    }

    public function getMetaKeywords(string $sku): string
    {
        $response = $this->get($sku);

        return $response['data']['attributes']['metaKeywords'];
    }

    public function getMetaDescription(string $sku): string
    {
        $response = $this->get($sku);

        return $response['data']['attributes']['metaDescription'];
    }
}
