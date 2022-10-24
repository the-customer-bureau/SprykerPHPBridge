<?php

declare(strict_types=1);

namespace Engineered\SprykerBridge;

use Engineered\AbstractProduct\AbstractProductFacade;
use Engineered\Auth\AuthFacade;
use Engineered\Cart\CartFacade;
use Engineered\Category\CategoryFacade;
use Engineered\ConcreteProduct\ConcreteProductFacade;
use Engineered\Customer\CustomerFacade;

use Engineered\Wishlist\WishlistFacade;
use Gacela\Framework\AbstractDependencyProvider;
use Gacela\Framework\Container\Container;

final class SprykerBridgeDependencyProvider extends AbstractDependencyProvider
{
    public const FACADE_AUTH = 'FACADE_AUTH';
    public const FACADE_CART = 'FACADE_CART';
    public const FACADE_CUSTOMER = 'FACADE_CUSTOMER';
    public const FACADE_ABSTRACT_PRODUCT = 'FACADE_ABSTRACT_PRODUCT';
    public const FACADE_CONCRETE_PRODUCT = 'FACADE_CONCRETE_PRODUCT';
    public const FACADE_CATEGORY = 'FACADE_CATEGORY';
    public const FACADE_WISHLIST = 'FACADE_WISHLIST';

    public function provideModuleDependencies(Container $container): void
    {
        $this->addAuthFacade($container);
        $this->addCartFacade($container);
        $this->addCustomerFacade($container);
        $this->addAbstractProductFacade($container);
        $this->addConcreteProductFacade($container);
        $this->addCategoryFacade($container);
        $this->addWishlistFacade($container);
    }

    private function addAuthFacade(Container $container): void
    {
        $container->set(
            self::FACADE_AUTH,
            static function (Container $container) {
                return $container->getLocator()->get(AuthFacade::class);
            }
        );
    }

    private function addCartFacade(Container $container): void
    {
        $container->set(
            self::FACADE_CART,
            static function (Container $container) {
                return $container->getLocator()->get(CartFacade::class);
            }
        );
    }

    private function addCustomerFacade(Container $container): void
    {
        $container->set(
            self::FACADE_CUSTOMER,
            static function (Container $container) {
                return $container->getLocator()->get(CustomerFacade::class);
            }
        );
    }

    private function addAbstractProductFacade(Container $container): void
    {
        $container->set(
            self::FACADE_ABSTRACT_PRODUCT,
            static function (Container $container) {
                return $container->getLocator()->get(AbstractProductFacade::class);
            }
        );
    }

    private function addConcreteProductFacade(Container $container): void
    {
        $container->set(
            self::FACADE_CONCRETE_PRODUCT,
            static function (Container $container) {
                return $container->getLocator()->get(ConcreteProductFacade::class);
            }
        );
    }

    private function addCategoryFacade(Container $container): void
    {
        $container->set(
            self::FACADE_CATEGORY,
            static function (Container $container) {
                return $container->getLocator()->get(CategoryFacade::class);
            }
        );
    }

    private function addWishlistFacade(Container $container): void
    {
        $container->set(
            self::FACADE_WISHLIST,
            static function (Container $container) {
                return $container->getLocator()->get(WishlistFacade::class);
            }
        );
    }
}
