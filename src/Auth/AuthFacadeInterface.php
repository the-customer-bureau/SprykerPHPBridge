<?php

declare(strict_types=1);

namespace Engineered\Auth;

interface AuthFacadeInterface
{
    public function getAccessToken(string $username, string $password): string;

    public function getAccessTokenArray(string $username, string $password): array;

    public function refreshTokens(string $refreshToken): array;
}
