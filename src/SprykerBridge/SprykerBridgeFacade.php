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

use Gacela\Framework\AbstractFacade;

/**
 * @method SprykerBridgeFactory getFactory()
 */
final class SprykerBridgeFacade extends AbstractFacade
{
    public function customer(): CustomerFacadeInterface
    {
        return $this->getFactory()->getCustomerFacade();
    }

    public function cart(): CartFacadeInterface
    {
        return $this->getFactory()->getCartFacade();
    }

    public function auth(): AuthFacadeInterface
    {
        return $this->getFactory()->getAuthFacade();
    }

    public function abstractProduct(): AbstractProductFacadeInterface
    {
        return $this->getFactory()->getAbstractProductFacade();
    }

    public function concreteProduct(): ConcreteProductFacadeInterface
    {
        return $this->getFactory()->getConcreteProductFacade();
    }

    public function category(): CategoryFacadeInterface
    {
        return $this->getFactory()->getCategoryFacade();
    }

    public function wishlist(): WishListFacadeInterface
    {
        return $this->getFactory()->getWishListFacade();
    }

    public function orders(): OrdersFacadeInterface
    {
        return $this->getFactory()->getOrdersFacade();
    }
    public function checkout(): CheckoutFacadeInterface
    {
        return $this->getFactory()->getCheckoutFacade();
    }
}
