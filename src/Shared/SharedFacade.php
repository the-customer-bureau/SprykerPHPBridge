<?php

declare(strict_types=1);

namespace Engineered\Shared;

use Gacela\Framework\AbstractFacade;

/**
 * @method SharedFactory getFactory()
 */
final class SharedFacade extends AbstractFacade
{
	public function getHttpClient(): \Symfony\Component\HttpClient\NativeHttpClient
	{
		return $this->getFactory()->createHttpClient()->get();
	}
}
