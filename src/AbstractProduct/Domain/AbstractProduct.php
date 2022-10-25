<?php

declare(strict_types=1);

namespace Engineered\AbstractProduct\Domain;

use Engineered\HttpClient\HttpClientFacadeInterface;

final class AbstractProduct
{
    public const ABSTRACT_PRODUCT_SEARCH_ENDPOINT = 'catalog-search?q=';
    private const ABSTRACT_PRODUCTS_ENDPOINT = 'abstract-products';
    private const RELATED_ABSTRACT_PRODUCTS_ENDPOINT = 'related-products';

    public function __construct(
        private HttpClientFacadeInterface $httpClient
    ) {
    }

    public function search(string $searchTerm): array
    {
        return $this->httpClient->get(self::ABSTRACT_PRODUCT_SEARCH_ENDPOINT . $searchTerm);
    }

    public function get(string $sku): array
    {
        return $this->httpClient->get(self::ABSTRACT_PRODUCTS_ENDPOINT . '/' . $sku);
    }

    public function getRelated(string $sku): array
    {
        return $this->httpClient->get(self::ABSTRACT_PRODUCTS_ENDPOINT . '/' . $sku . '/' . self::RELATED_ABSTRACT_PRODUCTS_ENDPOINT);
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
