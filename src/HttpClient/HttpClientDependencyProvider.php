<?php

declare(strict_types=1);

namespace Engineered\HttpClient;

use Gacela\Framework\AbstractDependencyProvider;
use Gacela\Framework\Container\Container;
use Symfony\Component\HttpClient\NativeHttpClient;

final class HttpClientDependencyProvider extends AbstractDependencyProvider
{
    public const CONCRETE_HTTP_CLIENT = 'CONCRETE_HTTP_CLIENT';

    public function provideModuleDependencies(Container $container): void
    {
        $this->addConcreteHttpClient($container);
    }

    private function addConcreteHttpClient(Container $container): void
    {
        $container->set(
            self::CONCRETE_HTTP_CLIENT,
            new NativeHttpClient()
        );
    }
}
