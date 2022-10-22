<?php

namespace Engineered\Resource\Domain;

use Engineered\HttpClient\HttpClientFacadeInterface;

class AbstractProduct
{

	private const ABSTRACT_PRODUCTS_ENDPOINT = 'abstract-products';
	private const RELATED_ABSTRACT_PRODUCTS_ENDPOINT = 'related-products';

	public function __construct(
        private HttpClientFacadeInterface $httpClient
	)
	{
	}

	public function get(string $sku): array
	{
		return $this->httpClient->get(self::ABSTRACT_PRODUCTS_ENDPOINT . '/' .$sku);

	}

	public function getRelated(string $sku): array
	{
		return $this->httpClient->get(self::ABSTRACT_PRODUCTS_ENDPOINT . '/' .$sku . '/'. self::RELATED_ABSTRACT_PRODUCTS_ENDPOINT);

	}


}
