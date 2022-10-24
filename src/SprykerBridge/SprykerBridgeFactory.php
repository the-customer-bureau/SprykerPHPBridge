<?php

declare(strict_types=1);

namespace Engineered\SprykerBridge;

use Engineered\Auth\AuthFacadeInterface;
use Engineered\Cart\CartFacadeInterface;
use Engineered\Collections\CollectionsFacadeInterface;
use Engineered\Customer\CustomerFacadeInterface;
use Engineered\Resource\ResourceFacadeInterface;
use Gacela\Framework\AbstractFactory;

/**
 * @method SprykerBridgeConfig getConfig()
 */
final class SprykerBridgeFactory extends AbstractFactory
{
    public function getCollectionsFacade(): CollectionsFacadeInterface
    {
        return $this->getProvidedDependency(
            SprykerBridgeDependencyProvider::FACADE_COLLECTIONS
        );
    }

    public function getAuthFacade(): AuthFacadeInterface
    {
        return $this->getProvidedDependency(
            SprykerBridgeDependencyProvider::FACADE_AUTH
        );
    }

    public function getCartFacade(): CartFacadeInterface
    {
        return $this->getProvidedDependency(
            SprykerBridgeDependencyProvider::FACADE_CART
        );
    }

    public function getResourceFacade(): ResourceFacadeInterface
    {
        return $this->getProvidedDependency(
            SprykerBridgeDependencyProvider::FACADE_RESOURCE
        );
    }

    public function getCustomerFacade(): CustomerFacadeInterface
    {
        return $this->getProvidedDependency(
            SprykerBridgeDependencyProvider::FACADE_CUSTOMER
        );
    }
}
