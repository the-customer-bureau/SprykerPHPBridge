<?php

namespace Engineered\Resource\Domain;

use Engineered\HttpClient\HttpClientFacadeInterface;

class ConcreteProduct
{

	private const CONCRETE_PRODUCTS_ENDPOINT = 'concrete-products';

	public function __construct(
		public readonly HttpClientFacadeInterface $httpClient
	)
	{
	}

	public function get(string $sku): array
	{
		return $this->httpClient->get(self::CONCRETE_PRODUCTS_ENDPOINT . '/' . $sku);

	}

}
