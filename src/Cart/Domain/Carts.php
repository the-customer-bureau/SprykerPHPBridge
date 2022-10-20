<?php

namespace Engineered\Cart\Domain;

use Engineered\HttpClient\HttpClientFacadeInterface;

class Carts
{

	private const CARTS_ENDPOINT = "carts";
	private const CART_ITEMS_ENDPOINT = "items";

	public function __construct(public readonly HttpClientFacadeInterface $httpClient)
	{
	}

	public function get(string $bearerToken, array $include = null): array
	{
		return $this->httpClient->getProtected(self::CARTS_ENDPOINT, $bearerToken, $include);
	}

	public function addToCustomersCart(string $sku, int $quantity, string $cartId, string $bearerToken): array
	{

		return $this->httpClient->post(
			self::CARTS_ENDPOINT . '/' . $cartId . '/' . self::CART_ITEMS_ENDPOINT,
			$this->getPayload($sku, $quantity),
			null,
			$bearerToken
		);
	}


	private function getPayload(string $sku, int $quantity): array
	{

		$payload = [];

		$payload['data']                           = [];
		$payload['data']['type']                   = self::CART_ITEMS_ENDPOINT;
		$payload['data']['attributes']['sku']      = $sku;
		$payload['data']['attributes']['quantity'] = $quantity;

		return $payload;
	}
}
