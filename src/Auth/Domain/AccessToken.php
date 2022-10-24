<?php

declare(strict_types=1);

namespace Engineered\Auth\Domain;

use Engineered\HttpClient\HttpClientFacadeInterface;

class AccessToken
{
    public const ACCESS_TOKEN_ENDPOINT = 'access-tokens';

    public function __construct(
        public HttpClientFacadeInterface $httpClient,
    ) {
    }

    public function get(string $username, string $password): array
    {
        return $this->httpClient->post(self::ACCESS_TOKEN_ENDPOINT, $this->getPayload($username, $password));
    }

    public function getAccessToken(string $username, string $password): string
    {
        $response = $this->get($username, $password);

        return $response['data']['attributes']['accessToken'];
    }

    public function getArray(string $username, string $password): array
    {
        return $this->get($username, $password);
    }

    private function getPayload(string $username, string $password): array
    {
        $payload = [];

        $payload['data']                           = [];
        $payload['data']['type']                   = self::ACCESS_TOKEN_ENDPOINT;
        $payload['data']['attributes']['username'] = $username;
        $payload['data']['attributes']['password'] = $password;

        return $payload;
    }
}
