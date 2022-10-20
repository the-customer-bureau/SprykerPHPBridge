<?php

namespace Engineered\HttpClient\Client;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class HttpClient
{

	public function __construct(
		private readonly HttpClientInterface $client,
		private readonly string              $glueApiUrl
	)
	{

	}

	public function get(string $endpoint): array
	{

		return $this->client->request('GET', $this->glueApiUrl . '/' . $endpoint)->toArray();

	}

	public function getProtected(string $endpoint, string $bearerToken): array
	{

		return $this->client->request('GET', $this->glueApiUrl . '/' . $endpoint,
			[
				'auth_bearer' => $bearerToken,
			]
		)->toArray();

	}


	public function post(string $endpoint, array $payload, array $headers = null, string $bearerToken = null): array
	{

		return $this->client->request('POST', $this->glueApiUrl . '/' . $endpoint,
			[
				'headers'     => $headers,
				'auth_bearer' => $bearerToken,
				'body'        => json_encode($payload),

			]
		)->toArray();

	}

}
