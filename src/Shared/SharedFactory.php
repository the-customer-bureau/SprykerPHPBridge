<?php

declare(strict_types=1);

namespace Engineered\Shared;

use Engineered\Shared\Domain\httpClient;

use Gacela\Framework\AbstractFactory;

/**
 * @method SharedConfig getConfig()
 */
final class SharedFactory extends AbstractFactory
{

	public function createHttpClient(): httpClient
	{
		return new httpClient();
	}
}
