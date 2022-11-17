<?php

declare(strict_types=1);

namespace Engineered\SprykerBridge;

use Engineered\AbstractProduct\AbstractProductFacadeInterface;
use Engineered\Auth\AuthFacadeInterface;
use Engineered\Cart\CartFacadeInterface;
use Engineered\Category\CategoryFacadeInterface;
use Engineered\Checkout\CheckoutFacadeInterface;
use Engineered\ConcreteProduct\ConcreteProductFacadeInterface;
use Engineered\Customer\CustomerFacadeInterface;

use Engineered\Orders\OrdersFacadeInterface;
use Engineered\Wishlist\WishlistFacadeInterface;
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

    public function getAbstractProductFacade(): AbstractProductFacadeInterface
    {
        return $this->getProvidedDependency(
            SprykerBridgeDependencyProvider::FACADE_ABSTRACT_PRODUCT
        );
    }

    public function getConcreteProductFacade(): ConcreteProductFacadeInterface
    {
        return $this->getProvidedDependency(
            SprykerBridgeDependencyProvider::FACADE_CONCRETE_PRODUCT
        );
    }

    public function getCategoryFacade(): CategoryFacadeInterface
    {
        return $this->getProvidedDependency(
            SprykerBridgeDependencyProvider::FACADE_CATEGORY
        );
    }

    public function getWishListFacade(): WishListFacadeInterface
    {
        return $this->getProvidedDependency(
            SprykerBridgeDependencyProvider::FACADE_WISHLIST
        );
    }

    public function getOrdersFacade(): OrdersFacadeInterface
    {
        return $this->getProvidedDependency(
            SprykerBridgeDependencyProvider::FACADE_ORDERS
        );
    }
    public function getCheckoutFacade(): CheckoutFacadeInterface
    {
        return $this->getProvidedDependency(
            SprykerBridgeDependencyProvider::FACADE_CHECKOUT
        );
    }
}
