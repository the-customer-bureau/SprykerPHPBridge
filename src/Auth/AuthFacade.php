<?php

declare(strict_types=1);

namespace Engineered\Auth;

use Gacela\Framework\AbstractFacade;

/**
 * @method AuthFactory getFactory()
 */
final class AuthFacade extends AbstractFacade
{

	public function getAccessToken(string $username, string $password, string $returnAttribute): array|string
	{

		return $this->getFactory()->createAccessToken()->get($username, $password, $returnAttribute);

	}

	public function refreshTokens(string $refreshToken): array
	{
		return $this->getFactory()->createRefreshToken()->refresh($refreshToken);
	}
}
