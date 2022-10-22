<?php

namespace Engineered\Cart\Domain;

use Engineered\Cart\Enums\GuestCartReturnAttribute;
use Engineered\HttpClient\HttpClientFacadeInterface;

class Carts
{

	private const CARTS_ENDPOINT = "carts";
	private const CART_ITEMS_ENDPOINT = "items";

	public function __construct(
        private HttpClientFacadeInterface $httpClient
    )
    {
    }

	public function get(string $bearerToken, array $include = null, GuestCartReturnAttribute $returnAttribute = null): array|string
	{

		$response = $this->httpClient->getProtected(self::CARTS_ENDPOINT, $bearerToken, $include);

		if (!$returnAttribute)
		{
			return $response;
		}
		if ($returnAttribute->value === 'id')
		{
			return $response['data']['id'];
		}

		if (str_contains($returnAttribute->value, '_'))
		{

			$returnAttributeArray = explode('_', $returnAttribute->value);

			return $response['data']['attributes'][$returnAttributeArray[0]][$returnAttributeArray[1]];
		}

		return $response['data']['attributes'][$returnAttribute->value];

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
