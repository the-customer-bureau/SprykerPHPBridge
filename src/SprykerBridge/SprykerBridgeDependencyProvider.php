<?php

declare(strict_types=1);

namespace Engineered\SprykerBridge;

use Engineered\AbstractProduct\AbstractProductFacade;
use Engineered\Auth\AuthFacade;
use Engineered\Cart\CartFacade;
use Engineered\Category\CategoryFacade;
use Engineered\Collections\CollectionsFacade;
use Engineered\Customer\CustomerFacade;

use Gacela\Framework\AbstractDependencyProvider;
use Gacela\Framework\Container\Container;

final class SprykerBridgeDependencyProvider extends AbstractDependencyProvider
{
    public const FACADE_COLLECTIONS = 'FACADE_COLLECTIONS';
    public const FACADE_AUTH = 'FACADE_AUTH';
    public const FACADE_CART = 'FACADE_CART';
    public const FACADE_RESOURCE = 'FACADE_RESOURCE';
    public const FACADE_CUSTOMER = 'FACADE_CUSTOMER';
    public const FACADE_ABSTRACT_PRODUCT = 'FACADE_ABSTRACT_PRODUCT';
    public const FACADE_CATEGORY = 'FACADE_CATEGORY';

    public function provideModuleDependencies(Container $container): void
    {
        $this->addCollectionsFacade($container);
        $this->addAuthFacade($container);
        $this->addCartFacade($container);
        $this->addResourceFacade($container);
        $this->addCustomerFacade($container);
        $this->addAbstractProductFacade($container);
        $this->addCategoryFacade($container);
    }

    private function addCollectionsFacade(Container $container): void
    {
        $container->set(
            self::FACADE_COLLECTIONS,
            static function (Container $container) {
                return $container->getLocator()->get(CollectionsFacade::class);
            }
        );
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

    private function addResourceFacade(Container $container): void
    {
        $container->set(
            self::FACADE_RESOURCE,
            static function (Container $container) {
                return $container->getLocator()->get(ResourceFacade::class);
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
    private function addCategoryFacade(Container $container): void
    {
        $container->set(
            self::FACADE_CATEGORY,
            static function (Container $container) {
                return $container->getLocator()->get(CategoryFacade::class);
            }
        );
    }
}
