<?php

namespace Engineered\Auth\Domain;

use Engineered\HttpClient\HttpClientFacadeInterface;

class RefreshToken
{

	public const REFRESH_TOKEN_ENDPOINT = 'refresh-tokens';


	public function __construct(
		public readonly HttpClientFacadeInterface $httpClient,
	)
	{
	}

	public function refresh(string $refreshToken, string $returnAttribute = null): array|string
	{
		$response = $this->httpClient->post(self::REFRESH_TOKEN_ENDPOINT, $this->getPayload($refreshToken));


		if (!$returnAttribute)
		{
			return $response;
		}

		return $response['data']['attributes'][$returnAttribute];


	}


	private function getPayload(string $refreshToken): array
	{

		$payload = [];

		$payload['data']                               = [];
		$payload['data']['type']                       = self::REFRESH_TOKEN_ENDPOINT;
		$payload['data']['attributes']['refreshToken'] = $refreshToken;

		return $payload;
	}


}
