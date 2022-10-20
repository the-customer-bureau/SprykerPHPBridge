<?php

declare(strict_types=1);

namespace Engineered\Auth;

use Engineered\Auth\Enums\TokenReturnAttribute;
use Gacela\Framework\AbstractFacade;

/**
 * @method AuthFactory getFactory()
 */
final class AuthFacade extends AbstractFacade
{

	public function getAccessToken(string $username, string $password, TokenReturnAttribute $returnAttribute = null): array|string
	{

		return $this->getFactory()->createAccessToken()->get($username, $password, $returnAttribute);

	}

	public function refreshTokens(string $refreshToken, TokenReturnAttribute $returnAttribute = null): array|string
	{
		return $this->getFactory()->createRefreshToken()->refresh($refreshToken, $returnAttribute);
	}
}
