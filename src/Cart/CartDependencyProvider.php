<?php

declare(strict_types=1);

namespace Engineered\Cart;

use Engineered\HttpClient\HttpClientFacade;
use Gacela\Framework\AbstractDependencyProvider;
use Gacela\Framework\Container\Container;

final class CartDependencyProvider extends AbstractDependencyProvider
{
	public const FACADE_HTTP_CLIENT = 'FACADE_HTTP_CLIENT';

	public function provideModuleDependencies(Container $container): void
	{
		$this->addSharedFacade($container);
	}

	private function addSharedFacade(Container $container) {
		$container->set(
			self::FACADE_HTTP_CLIENT,
			function (Container $container) {
				return $container->getLocator()->get(HttpClientFacade::class);
			}
		);
	}
}
