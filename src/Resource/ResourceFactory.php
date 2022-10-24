<?php

declare(strict_types=1);

namespace Engineered\Resource;

use Engineered\HttpClient\HttpClientFacadeInterface;
use Engineered\Resource\Domain\AbstractProduct;
use Engineered\Resource\Domain\Category;
use Engineered\Resource\Domain\ConcreteProduct;
use Gacela\Framework\AbstractFactory;

/**
 * @method ResourceConfig getConfig()
 */
final class ResourceFactory extends AbstractFactory
{
    public function createCategory(): Category
    {
        return new Category($this->getHttpClient());
    }

    public function createAbstractProduct(): AbstractProduct
    {
        return new AbstractProduct($this->getHttpClient());
    }

    public function createConcreteProduct(): ConcreteProduct
    {
        return new ConcreteProduct($this->getHttpClient());
    }

    private function getHttpClient(): HttpClientFacadeInterface
    {
        return $this->getProvidedDependency(
            ResourceDependencyProvider::FACADE_HTTP_CLIENT
        );
    }
}
