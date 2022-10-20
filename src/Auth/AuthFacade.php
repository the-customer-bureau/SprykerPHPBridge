<?php

declare(strict_types=1);

namespace Engineered\Auth;

use Gacela\Framework\AbstractFacade;

/**
 * @method AuthFactory getFactory()
 */
final class AuthFacade extends AbstractFacade
{

	public function getAccessTokenArray(string $username, string $password): array
	{

		return $this->getFactory()->createAccessToken()->get($username, $password);

	}
	public function refreshTokens(string $refreshToken)
	{

	}
}
