<?php

declare(strict_types=1);

namespace Engineered\AbstractProduct;

use Gacela\Framework\AbstractFacade;

/**
 * @method AbstractProductFactory getFactory()
 */
final class AbstractProductFacade extends AbstractFacade implements AbstractProductFacadeInterface
{
    public function search(string $searchTerm): array
    {
        return $this->getFactory()
            ->createAbstractProduct()
            ->search($searchTerm);
    }

    public function get(string $sku): array
    {
        return $this->getFactory()
            ->createAbstractProduct()
            ->get($sku);
    }

    public function getReviewCount(string $sku): int
    {
        return $this->getFactory()
            ->createAbstractProduct()
            ->getReviewCount($sku);
    }

    public function getName(string $sku): string
    {
        return $this->getFactory()
            ->createAbstractProduct()
            ->getName($sku);
    }

    public function getDescription(string $sku): string
    {
        return $this->getFactory()
            ->createAbstractProduct()
            ->getDescription($sku);
    }

    public function getMetaTitle(string $sku): string
    {
        return $this->getFactory()
            ->createAbstractProduct()
            ->getMetaTitle($sku);
    }

    public function getMetaKeywords(string $sku): string
    {
        return $this->getFactory()
            ->createAbstractProduct()
            ->getMetaKeywords($sku);
    }

    public function getMetaDescription(string $sku): string
    {
        return $this->getFactory()
            ->createAbstractProduct()
            ->getMetaDescription($sku);
    }
}
