<?php

declare(strict_types=1);

namespace Engineered\SprykerBridge;

use Gacela\Framework\AbstractFacade;

/**
 * @method SprykerBridgeFactory getFactory()
 */
final class SprykerBridgeFacade extends AbstractFacade
{

	public function getCategoryTrees(): array
	{
		return $this->getFactory()->getCollectionsFacade()->getCategoryTrees();
	}

	public function searchAbstractProducts(string $searchTerm): array
	{
		return $this->getFactory()->getCollectionsFacade()->searchAbstractProducts($searchTerm);
	}



}
