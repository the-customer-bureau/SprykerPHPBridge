<?php

declare(strict_types=1);

namespace Engineered\HttpClient\Client;

use Symfony\Contracts\HttpClient\HttpClientInterface;

final class HttpClient
{
    public function __construct(
        private HttpClientInterface $client,
        private string $glueApiUrl
    ) {
    }

    public function get(string $endpoint): array
    {
        return $this->client->request('GET', $this->glueApiUrl . '/' . $endpoint)->toArray();
    }

    public function getProtected(string $endpoint, string $bearerToken): array
    {
        return $this->client->request(
            'GET',
            $this->glueApiUrl . '/' . $endpoint,
            [
                'auth_bearer' => $bearerToken,
            ]
        )->toArray();
    }

    public function post(string $endpoint, array $payload, array $headers = null, string $bearerToken = null): array
    {
        return $this->client->request(
            'POST',
            $this->glueApiUrl . '/' . $endpoint,
            [
                'headers'     => $headers,
                'auth_bearer' => $bearerToken,
                'body'        => json_encode($payload),

            ]
        )->toArray();
    }

    public function delete(string $endpoint, array $payload, array $headers = null, string $bearerToken = null): array
    {
        return $this->client->request(
            'DELETE',
            $this->glueApiUrl . '/' . $endpoint,
            [
                'headers'     => $headers,
                'auth_bearer' => $bearerToken,
                'body'        => json_encode($payload),

            ]
        )->toArray();
    }
}
