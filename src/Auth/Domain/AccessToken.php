<?php

namespace Engineered\Auth\Domain;


use Engineered\HttpClient\HttpClientFacadeInterface;

class AccessToken
{


	public const ACCESS_TOKEN_ENDPOINT = 'access-tokens';


	public function __construct(
		public HttpClientFacadeInterface $httpClient,
	)
	{
	}


	public function get(string $username, string $password, ?string $returnAttribute = null): array|string
	{

		$response = $this->httpClient->post(self::ACCESS_TOKEN_ENDPOINT, $this->getPayload($username, $password));

		if ($returnAttribute === null)
		{
			return $response;
		}

		return $response['data']['attributes'][$returnAttribute];


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
