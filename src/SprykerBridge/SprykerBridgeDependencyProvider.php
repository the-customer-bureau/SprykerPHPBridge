<?php

declare(strict_types=1);

namespace Engineered\SprykerBridge;

use Engineered\Auth\AuthFacade;
use Engineered\Collections\CollectionsFacade;

use Gacela\Framework\AbstractDependencyProvider;
use Gacela\Framework\Container\Container;

final class SprykerBridgeDependencyProvider extends AbstractDependencyProvider
{
	public const FACADE_COLLECTIONS = 'FACADE_COLLECTIONS';
	public const FACADE_AUTH = 'FACADE_AUTH';

	public function provideModuleDependencies(Container $container): void
	{
		$this->addCollectionsFacade($container);
		$this->addAuthFacade($container);
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

}
