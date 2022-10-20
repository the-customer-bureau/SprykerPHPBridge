<?php

declare(strict_types=1);

namespace Engineered\HttpClient;

use Gacela\Framework\AbstractFacade;

/**
 * @method HttpClientFactory getFactory()
 */
final class HttpClientFacade extends AbstractFacade
{

	public function get(string $endpoint)
	{
		return $this->getFactory()->createClient()->get($endpoint);
	}

	public function getProtected(string $endpoint, string $bearerToken)
	{
		return $this->getFactory()->createClient()->getProtected($endpoint, $bearerToken);
	}

	public function post(string $endpoint, string $bearerToken)
	{

		return $this->getFactory()->createClient()->post($endpoint, $bearerToken);

	}
}
