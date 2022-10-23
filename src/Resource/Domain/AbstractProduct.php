<?php

namespace Engineered\Resource\Domain;

use Engineered\HttpClient\HttpClientFacadeInterface;

class AbstractProduct
{

	private const ABSTRACT_PRODUCTS_ENDPOINT = 'abstract-products';
	private const RELATED_ABSTRACT_PRODUCTS_ENDPOINT = 'related-products';

	public function __construct(
		public readonly HttpClientFacadeInterface $httpClient
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

	public function getReviewCount(string $sku): string
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
