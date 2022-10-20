<?php

declare(strict_types=1);

namespace Engineered\SprykerBridge;

use Engineered\Auth\AuthFacade;
use Engineered\Cart\CartFacade;
use Engineered\Collections\CollectionsFacade;

use Gacela\Framework\AbstractFactory;

/**
 * @method SprykerBridgeConfig getConfig()
 */
final class SprykerBridgeFactory extends AbstractFactory
{

	public function getCollectionsFacade(): CollectionsFacade
	{
		return $this->getProvidedDependency(
			SprykerBridgeDependencyProvider::FACADE_COLLECTIONS
		);
	}


	public function getAuthFacade(): AuthFacade
	{
		return $this->getProvidedDependency(
			SprykerBridgeDependencyProvider::FACADE_AUTH
		);
	}

	public function getCartFacade(): CartFacade
	{
		return $this->getProvidedDependency(
			SprykerBridgeDependencyProvider::FACADE_CART
		);
	}

}
