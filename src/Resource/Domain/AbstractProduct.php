<?php

namespace Engineered\Resource\Domain;

use Engineered\HttpClient\HttpClientFacadeInterface;

class AbstractProduct
{

	private const ABSTRACT_PRODUCTS_ENDPOINT = 'abstract-products';

	public function __construct(
		public readonly HttpClientFacadeInterface $httpClient
	)
	{
	}

	public function get(string $sku): array
	{
		return $this->httpClient->get(self::ABSTRACT_PRODUCTS_ENDPOINT . '/' .$sku);

	}


}
