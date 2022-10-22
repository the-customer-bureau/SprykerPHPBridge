<?php

namespace Engineered\Customer\Domain;

use Engineered\Customer\Enums\WishlistsAttribute;
use Engineered\HttpClient\HttpClientFacadeInterface;

class Wishlists
{

	public const WISHLISTS_ENDPOINT = 'wishlists';
	public const WISHLIST_ITEMS_ENDPOINT = 'wishlist-items';


	public function __construct(
        private HttpClientFacadeInterface $httpClient,
	)
	{
	}

	public function get(string $wishlistId, string $bearerToken): array
	{
		return $this->httpClient->getProtected(self::WISHLISTS_ENDPOINT . '/' . $wishlistId, $bearerToken);
	}

	public function getList(string $bearerToken): array
	{
		return $this->httpClient->getProtected(self::WISHLISTS_ENDPOINT, $bearerToken);
	}


	public function create(string $name, string $bearerToken, WishlistsAttribute $returnAttribute = null): array|string
	{
		$response = $this->httpClient->post(self::WISHLISTS_ENDPOINT, $this->getCreationPayload($name), null, $bearerToken);

		if (!$returnAttribute)
		{
			return $response;
		}
		if ($returnAttribute->value === 'id')
		{
			return $response['data']['id'];
		}

		return $response['data']['attributes'][$returnAttribute->value];


	}

	public function add(string $wishlistId, string $sku, string $bearerToken): array
	{
		return $this->httpClient->post(
			self::WISHLISTS_ENDPOINT . '/' . $wishlistId . '/' . self::WISHLIST_ITEMS_ENDPOINT,
			$this->getAdditionPayload($sku),
			null,
			$bearerToken);

	}

	public function delete(string $wishlistId, string $sku, string $bearerToken): array
	{
		return $this->httpClient->delete(self::WISHLISTS_ENDPOINT . '/' . $wishlistId, null, $bearerToken);

	}


	private function getCreationPayload(string $name): array
	{

		$payload = [];

		$payload['data']                       = [];
		$payload['data']['type']               = self::WISHLISTS_ENDPOINT;
		$payload['data']['attributes']['name'] = $name;

		return $payload;

	}

	private function getAdditionPayload(string $sku): array
	{
		$payload = [];

		$payload['data']                      = [];
		$payload['data']['type']              = self::WISHLIST_ITEMS_ENDPOINT;
		$payload['data']['attributes']['sku'] = $sku;

		return $payload;

	}
}
