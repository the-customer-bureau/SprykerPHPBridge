<?php

declare(strict_types=1);

namespace Engineered\Auth\Domain;

use Engineered\HttpClient\HttpClientFacadeInterface;

class RefreshToken
{
    public const REFRESH_TOKEN_ENDPOINT = 'refresh-tokens';

    public function __construct(
        public HttpClientFacadeInterface $httpClient,
    ) {
    }

    public function refresh(string $refreshToken): array
    {
        return $this->httpClient->post(self::REFRESH_TOKEN_ENDPOINT, $this->getPayload($refreshToken));
    }

    private function getPayload(string $refreshToken): array
    {
        $payload = [];

        $payload['data']                               = [];
        $payload['data']['type']                       = self::REFRESH_TOKEN_ENDPOINT;
        $payload['data']['attributes']['refreshToken'] = $refreshToken;

        return $payload;
    }
}
