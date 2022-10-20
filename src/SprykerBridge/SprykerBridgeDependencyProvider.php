<?php

declare(strict_types=1);

namespace Engineered\SprykerBridge;

use Engineered\Auth\AuthFacade;
use Engineered\Cart\CartFacade;
use Engineered\Collections\CollectionsFacade;

use Engineered\Customer\CustomerFacade;
use Engineered\Resource\ResourceFacade;
use Gacela\Framework\AbstractDependencyProvider;
use Gacela\Framework\Container\Container;

final class SprykerBridgeDependencyProvider extends AbstractDependencyProvider
{
	public const FACADE_COLLECTIONS = 'FACADE_COLLECTIONS';
	public const FACADE_AUTH = 'FACADE_AUTH';
	public const FACADE_CART = 'FACADE_CART';
	public const FACADE_RESOURCE = 'FACADE_RESOURCE';
	public const FACADE_CUSTOMER = 'FACADE_CUSTOMER';

	public function provideModuleDependencies(Container $container): void
	{
		$this->addCollectionsFacade($container);
		$this->addAuthFacade($container);
		$this->addCartFacade($container);
		$this->addResourceFacade($container);
		$this->addRCustomerFacade($container);
	}

	private function addCollectionsFacade(Container $container): void
	{
		$container->set(
			self::FACADE_COLLECTIONS,
			function (Container $container) {
				return $container->getLocator()->get(CollectionsFacade::class);
			}
		);
	}

	private function addAuthFacade(Container $container): void
	{
		$container->set(
			self::FACADE_AUTH,
			function (Container $container) {
				return $container->getLocator()->get(AuthFacade::class);
			}
		);
	}

	private function addCartFacade(Container $container): void
	{
		$container->set(
			self::FACADE_CART,
			function (Container $container) {
				return $container->getLocator()->get(CartFacade::class);
			}
		);
	}

	private function addResourceFacade(Container $container): void
	{
		$container->set(
			self::FACADE_RESOURCE,
			function (Container $container) {
				return $container->getLocator()->get(ResourceFacade::class);
			}
		);
	}

	private function addRCustomerFacade(Container $container): void
	{
		$container->set(
			self::FACADE_CUSTOMER,
			function (Container $container) {
				return $container->getLocator()->get(CustomerFacade::class);
			}
		);
	}

}
