<?php

declare(strict_types=1);

namespace Engineered\Auth;

use Gacela\Framework\AbstractFacade;

/**
 * @method AuthFactory getFactory()
 */
final class AuthFacade extends AbstractFacade implements AuthFacadeInterface
{
    public function getAccessToken(string $username, string $password): string
    {
        return $this->getFactory()
            ->createAccessToken()
            ->getAccessToken($username, $password);
    }

    public function getAccessTokenArray(string $username, string $password): array
    {
        return $this->getFactory()
            ->createAccessToken()
            ->getArray($username, $password);
    }

    public function refreshTokens(string $refreshToken): array
    {
        return $this->getFactory()
            ->createRefreshToken()
            ->refresh($refreshToken);
    }
}
