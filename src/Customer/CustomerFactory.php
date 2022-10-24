<?php

declare(strict_types=1);

namespace Engineered\Customer;

use Engineered\Customer\Domain\Wishlists;
use Engineered\HttpClient\HttpClientFacadeInterface;
use Gacela\Framework\AbstractFactory;

/**
 * @method CustomerConfig getConfig()
 */
final class CustomerFactory extends AbstractFactory
{
    public function createWishlists(): Wishlists
    {
        return new Wishlists($this->getHttpClient());
    }

    private function getHttpClient(): HttpClientFacadeInterface
    {
        return $this->getProvidedDependency(
            CustomerDependencyProvider::FACADE_HTTP_CLIENT
        );
    }
}
