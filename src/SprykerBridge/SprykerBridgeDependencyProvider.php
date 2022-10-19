<?php

declare(strict_types=1);

namespace Engineered\SprykerBridge;

use Engineered\Collections\CollectionsFacade;

use Gacela\Framework\AbstractDependencyProvider;
use Gacela\Framework\Container\Container;

final class SprykerBridgeDependencyProvider extends AbstractDependencyProvider
{
	public const FACADE_COLLECTIONS = 'FACADE_COLLECTIONS';

	public function provideModuleDependencies(Container $container): void
	{
		$this->addCollectionsFacade($container);
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

}
