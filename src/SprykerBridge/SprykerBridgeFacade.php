<?php

declare(strict_types=1);

namespace Engineered\SprykerBridge;

use Engineered\AbstractProduct\AbstractProductFacadeInterface;
use Engineered\Auth\AuthFacadeInterface;
use Engineered\Cart\CartFacadeInterface;
use Engineered\Category\CategoryFacadeInterface;
use Engineered\Customer\CustomerFacadeInterface;

use Gacela\Framework\AbstractFacade;

/**
 * @method SprykerBridgeFactory getFactory()
 */
final class SprykerBridgeFacade extends AbstractFacade
{
    /****
     *
     *
     * NEW API?
     *
     */

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
    public function category(): CategoryFacadeInterface
    {
        return $this->getFactory()->getCategoryFacade();
    }
}
