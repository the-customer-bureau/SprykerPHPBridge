<?php

declare(strict_types=1);

namespace Engineered\ConcreteProduct;

use Gacela\Framework\AbstractFacade;

/**
 * @method ConcreteProductFactory getFactory()
 */
final class ConcreteProductFacade extends AbstractFacade implements ConcreteProductFacadeInterface
{
    public function get(string $sku): array
    {
        return $this->getFactory()
            ->createConcreteProduct()
            ->get($sku);
    }

    public function getReviewCount(string $sku): int
    {
        return $this->getFactory()
            ->createConcreteProduct()
            ->getReviewCount($sku);
    }

    public function getName(string $sku): string
    {
        return $this->getFactory()
            ->createConcreteProduct()
            ->getName($sku);
    }

    public function getDescription(string $sku): string
    {
        return $this->getFactory()
            ->createConcreteProduct()
            ->getDescription($sku);
    }

    public function getMetaTitle(string $sku): string
    {
        return $this->getFactory()
            ->createConcreteProduct()
            ->getMetaTitle($sku);
    }

    public function getMetaKeywords(string $sku): string
    {
        return $this->getFactory()
            ->createConcreteProduct()
            ->getMetaKeywords($sku);
    }

    public function getMetaDescription(string $sku): string
    {
        return $this->getFactory()
            ->createConcreteProduct()
            ->getMetaDescription($sku);
    }
}
