<?php

declare(strict_types=1);

namespace Engineered\SprykerBridge;

use Engineered\AbstractProduct\AbstractProductFacade;
use Engineered\Auth\AuthFacadeInterface;
use Engineered\Cart\CartFacadeInterface;
use Engineered\Category\CategoryFacade;
use Engineered\Customer\CustomerFacadeInterface;

use Gacela\Framework\AbstractFactory;

/**
 * @method SprykerBridgeConfig getConfig()
 */
final class SprykerBridgeFactory extends AbstractFactory
{
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

    public function getCustomerFacade(): CustomerFacadeInterface
    {
        return $this->getProvidedDependency(
            SprykerBridgeDependencyProvider::FACADE_CUSTOMER
        );
    }

    public function getAbstractProductFacade(): AbstractProductFacade
    {
        return $this->getProvidedDependency(
            SprykerBridgeDependencyProvider::FACADE_ABSTRACT_PRODUCT
        );
    }

    public function getCategoryFace(): CategoryFacade
    {
        return $this->getProvidedDependency(
            SprykerBridgeDependencyProvider::FACADE_CATEGORY
        );
    }
}
