<?php

namespace Engineered\Auth\Domain;

use Engineered\HttpClient\HttpClientFacade;

class AccessToken
{


	public const CATEGORY_TREES_ENDPOINT = 'access-tokens';


	public function __construct(
		public readonly HttpClientFacade $httpClient,
	)
	{
	}


	public function get($username, $password): array
	{
		return $this->httpClient->post(self::CATEGORY_TREES_ENDPOINT, $this->getPayload($username, $password));
	}


	private function getPayload($username, $password): array
	{

		$payload = [];

		$payload['data']                           = [];
		$payload['data']['type']                   = "access-tokens";
		$payload['data']['attributes']['username'] = $username;
		$payload['data']['attributes']['password'] = $password;

		return $payload;
	}


}
