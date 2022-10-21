<?php

declare(strict_types=1);

namespace Engineered\HttpClient;

use Engineered\HttpClient\Client\HttpClient;

use Gacela\Framework\AbstractFactory;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * @method HttpClientConfig getConfig()
 */
final class HttpClientFactory extends AbstractFactory
{

	public function createClient(): HttpClient
	{
		return new HttpClient(
			$this->getConcreteHttpClient(),
			$this->getConfig()->getGlueUrl()
		);
	}


	private function getConcreteHttpClient(): HttpClientInterface
	{
		return $this->getProvidedDependency(
			HttpClientDependencyProvider::CONCRETE_HTTP_CLIENT
		);

	}
}
