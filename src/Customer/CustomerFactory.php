<?php

declare(strict_types=1);

namespace Engineered\Customer;

use Engineered\Customer\Domain\Customer;
use Engineered\HttpClient\HttpClientFacadeInterface;
use Gacela\Framework\AbstractFactory;

/**
 * @method CustomerConfig getConfig()
 */
final class CustomerFactory extends AbstractFactory
{
    public function createCustomer(): Customer
    {
        return new Customer($this->getHttpClient());
    }

    private function getHttpClient(): HttpClientFacadeInterface
    {
        return $this->getProvidedDependency(
            CustomerDependencyProvider::FACADE_HTTP_CLIENT
        );
    }
}
