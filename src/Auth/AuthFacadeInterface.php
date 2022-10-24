<?php

declare(strict_types=1);

namespace Engineered\Auth;

interface AuthFacadeInterface
{
    public function getAccessToken(string $username, string $password, ?string $returnAttribute = null): array|string;

    public function refreshTokens(string $refreshToken, ?string $returnAttribute = null): array|string;
}
