<?php

namespace Engineered\Customer\Domain;

use Engineered\HttpClient\HttpClientFacadeInterface;

class Wishlists
{

	public const WISHLISTS_ENDPOINT = 'wishlists';


	public function __construct(
		public readonly HttpClientFacadeInterface $httpClient,
	)
	{
	}

	public function get(string $bearerToken): array
	{
		return $this->httpClient->getProtected(self::WISHLISTS_ENDPOINT, $bearerToken);
	}


	public function create(string $name, string $bearerToken): array
	{
		return $this->httpClient->post(self::WISHLISTS_ENDPOINT, $this->getCreationPayload($name), null, $bearerToken);

	}


	private function getCreationPayload(string $name): array
	{

		$payload = [];

		$payload['data']                       = [];
		$payload['data']['type']               = self::WISHLISTS_ENDPOINT;
		$payload['data']['attributes']['name'] = $name;

		return $payload;

	}

}
