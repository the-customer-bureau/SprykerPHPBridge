<?php

declare(strict_types=1);

namespace Engineered\Auth;

use Engineered\Auth\Domain\AccessToken;
use Engineered\Auth\Domain\RefreshToken;
use Engineered\HttpClient\HttpClientFacadeInterface;
use Gacela\Framework\AbstractFactory;

/**
 * @method AuthConfig getConfig()
 */
final class AuthFactory extends AbstractFactory
{
    public function createAccessToken(): AccessToken
    {
        return new AccessToken($this->getHttpClient());
    }

    public function createRefreshToken(): RefreshToken
    {
        return new RefreshToken($this->getHttpClient());
    }

    private function getHttpClient(): HttpClientFacadeInterface
    {
        return $this->getProvidedDependency(
            AuthDependencyProvider::FACADE_HTTP_CLIENT
        );
    }
}
