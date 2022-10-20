<?php

declare(strict_types=1);

namespace Engineered\HttpClient;

use Gacela\Framework\AbstractFacade;

/**
 * @method HttpClientFactory getFactory()
 */
final class HttpClientFacade extends AbstractFacade implements HttpClientFacadeInterface
{

	public function get(string $endpoint, array $include = null): array
	{
		return $this->getFactory()->createClient()->get($endpoint . '?include=' . ($include ? implode(',', $include) : ''));
	}

	public function getProtected(string $endpoint, string $bearerToken, array $include = null): array
	{
		return $this->getFactory()->createClient()->getProtected($endpoint . '?include=' . ($include ? implode(',', $include) : ''), $bearerToken);
	}

	public function post(string $endpoint, array $payload, array $headers = null, string $bearerToken = null): array
	{
		return $this->getFactory()->createClient()->post($endpoint, $payload, $headers, $bearerToken);
	}
}
