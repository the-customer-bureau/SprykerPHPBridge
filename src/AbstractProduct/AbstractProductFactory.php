<?php

declare(strict_types=1);

namespace Engineered\AbstractProduct;

use Engineered\AbstractProduct\Domain\AbstractProduct;
use Engineered\HttpClient\HttpClientFacadeInterface;
use Gacela\Framework\AbstractFactory;

/**
 * @method AbstractProductConfig getConfig()
 */
final class AbstractProductFactory extends AbstractFactory
{
    public function createAbstractProduct(): AbstractProduct
    {
        return new AbstractProduct($this->getHttpClient());
    }

    private function getHttpClient(): HttpClientFacadeInterface
    {
        return $this->getProvidedDependency(
            AbstractProductDependencyProvider::FACADE_HTTP_CLIENT
        );
    }
}
