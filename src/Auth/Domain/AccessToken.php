<?php

namespace Engineered\Auth\Domain;

use Engineered\HttpClient\HttpClientFacade;

class AccessToken
{


	public const ACCESS_TOKEN_ENDPOINT = 'access-tokens';


	public function __construct(
		public readonly HttpClientFacade $httpClient,
	)
	{
	}


	public function get(string $username, string $password): array
	{
		return $this->httpClient->post(self::ACCESS_TOKEN_ENDPOINT, $this->getPayload($username, $password));
	}


	private function getPayload(string $username, string $password): array
	{

		$payload = [];

		$payload['data']                           = [];
		$payload['data']['type']                   = self::ACCESS_TOKEN_ENDPOINT;
		$payload['data']['attributes']['username'] = $username;
		$payload['data']['attributes']['password'] = $password;

		return $payload;
	}


}
