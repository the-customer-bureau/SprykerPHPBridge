<?php

declare(strict_types=1);

namespace Engineered\ConcreteProduct;

use Engineered\ConcreteProduct\Domain\ConcreteProduct;
use Engineered\HttpClient\HttpClientFacadeInterface;
use Gacela\Framework\AbstractFactory;

/**
 * @method ConcreteProductConfig getConfig()
 */
final class ConcreteProductFactory extends AbstractFactory
{
    public function createConcreteProduct(): ConcreteProduct
    {
        return new ConcreteProduct($this->getHttpClient());
    }

    private function getHttpClient(): HttpClientFacadeInterface
    {
        return $this->getProvidedDependency(
            ConcreteProductDependencyProvider::FACADE_HTTP_CLIENT
        );
    }
}
