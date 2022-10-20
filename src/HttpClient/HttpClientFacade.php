<?php

declare(strict_types=1);

namespace Engineered\HttpClient;

use Gacela\Framework\AbstractFacade;

/**
 * @method HttpClientFactory getFactory()
 */
final class HttpClientFacade extends AbstractFacade implements HttpClientFacadeInterface
{

	public function get(string $endpoint): array
	{
		return $this->getFactory()->createClient()->get($endpoint);
	}

	public function getProtected(string $endpoint, string $bearerToken): array
	{
		return $this->getFactory()->createClient()->getProtected($endpoint, $bearerToken);
	}

	public function post(string $endpoint, array $payload, array $headers = null, string $bearerToken = null): array
	{

		return $this->getFactory()->createClient()->post($endpoint, $payload, $headers, $bearerToken);

	}
}
