<?php

declare(strict_types=1);

namespace Engineered\HttpClient;

use Engineered\HttpClient\Client\HttpClient;
use Gacela\Framework\AbstractFactory;
use Symfony\Component\HttpClient\NativeHttpClient;

/**
 * @method HttpClientConfig getConfig()
 */
final class HttpClientFactory extends AbstractFactory
{

	public function createClient(): HttpClient
	{
		return new HttpClient(
			new NativeHttpClient(),
			$this->getConfig()->getGlueUrl()
		);
	}
}
