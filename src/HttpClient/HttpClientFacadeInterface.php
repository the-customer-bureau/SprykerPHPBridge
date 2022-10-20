<?php

declare(strict_types=1);

namespace Engineered\HttpClient;

interface HttpClientFacadeInterface
{
	public function get(string $endpoint): array;

	public function getProtected(string $endpoint, string $bearerToken): array;

	public function post(string $endpoint, array $payload, array $headers = null, string $bearerToken = null): array;

}
