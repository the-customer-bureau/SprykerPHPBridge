<?php

declare(strict_types=1);

namespace Engineered\Collections;

use Engineered\Collections\Domain\CategoryTrees;
use Engineered\Shared\SharedFacade;
use Gacela\Framework\AbstractFactory;

/**
 * @method CollectionsConfig getConfig()
 */
final class CollectionsFactory extends AbstractFactory
{

	public function createCategoryTrees(): CategoryTrees
	{
		return new CategoryTrees(
			$this->getHttpClient(),
			$this->getConfig()->getGlueUrl()
		);
	}


	private function getHttpClient(): SharedFacade
	{
		return $this->getProvidedDependency(
			CollectionsDependencyProvider::FACADE_SHARED
		);
	}


}
