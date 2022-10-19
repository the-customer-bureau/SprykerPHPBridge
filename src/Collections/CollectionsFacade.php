<?php

declare(strict_types=1);

namespace Engineered\Collections;

use Gacela\Framework\AbstractFacade;

/**
 * @method CollectionsFactory getFactory()
 */
final class CollectionsFacade extends AbstractFacade
{

	public function getCategoryTrees(): array
	{
		return $this->getFactory()->createCategoryTrees()->get();
	}
}
