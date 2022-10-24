<?php

declare(strict_types=1);

namespace Engineered\Collections;

use Engineered\Collections\Domain\AbstractProducts;
use Engineered\Collections\Domain\CategoryTrees;
use Engineered\HttpClient\HttpClientFacadeInterface;
use Gacela\Framework\AbstractFactory;

/**
 * @method CollectionsConfig getConfig()
 */
final class CollectionsFactory extends AbstractFactory
{
    public function createCategoryTrees(): CategoryTrees
    {
        return new CategoryTrees(
            $this->getHttpClient()
        );
    }

    public function createAbstractProducts(): AbstractProducts
    {
        return new AbstractProducts(
            $this->getHttpClient()
        );
    }

    private function getHttpClient(): HttpClientFacadeInterface
    {
        return $this->getProvidedDependency(
            CollectionsDependencyProvider::FACADE_HTTP_CLIENT
        );
    }
}
