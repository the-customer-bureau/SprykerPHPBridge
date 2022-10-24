<?php

declare(strict_types=1);

namespace Engineered\SprykerBridge;

use Engineered\AbstractProduct\AbstractProductFacade;
use Engineered\Auth\AuthFacadeInterface;
use Engineered\Cart\CartFacadeInterface;
use Engineered\Category\CategoryFacade;
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

    public function abstractProduct(): AbstractProductFacade
    {
        return $this->getFactory()->getAbstractProductFacade();
    }
    public function category(): CategoryFacade
    {
        return $this->getFactory()->getCategoryFace();
    }
}
