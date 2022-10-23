<?php

declare(strict_types=1);

namespace Tests\Fakes;

use Engineered\HttpClient\HttpClientDependencyProvider;
use Gacela\Framework\AbstractDependencyProvider;
use Gacela\Framework\Container\Container;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class FakeHttpClientDependencyProvider extends AbstractDependencyProvider
{
    private HttpClientInterface $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function provideModuleDependencies(Container $container): void
    {
        $container->set(
            HttpClientDependencyProvider::CONCRETE_HTTP_CLIENT,
            $this->httpClient
        );
    }
}
