<?php

declare(strict_types=1);

namespace Engineered\Resource;

use Gacela\Framework\AbstractFacade;

/**
 * @method ResourceFactory getFactory()
 */
final class ResourceFacade extends AbstractFacade
{
	public function getCategory(int $id): array
	{
		return $this->getFactory()
			->createCategory()
			->get($id);
	}

	public function getAbstractProduct(string $sku): array
	{
		return $this->getFactory()
			->createAbstractProduct()
			->get($sku);
	}


	public function getRelatedAbstractProducts(string $sku): array
	{
		return $this->getFactory()
			->createAbstractProduct()
			->getRelated($sku);
	}

	public function getConcreteProduct(string $sku): array
	{
		return $this->getFactory()
			->createConcreteProduct()
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
