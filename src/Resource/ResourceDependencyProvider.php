<?php

declare(strict_types=1);

namespace Engineered\Resource;

use Engineered\Shared\SharedFacade;
use Gacela\Framework\AbstractDependencyProvider;
use Gacela\Framework\Container\Container;

final class ResourceDependencyProvider extends AbstractDependencyProvider
{
	public const FACADE_SHARED = 'FACADE_SHARED';

	public function provideModuleDependencies(Container $container): void
	{
		$this->addSharedFacade($container);
	}

	private function addSharedFacade(Container $container) {
		$container->set(
			self::FACADE_SHARED,
			function (Container $container) {
				return $container->getLocator()->get(SharedFacade::class);
			}
		);
	}
}
