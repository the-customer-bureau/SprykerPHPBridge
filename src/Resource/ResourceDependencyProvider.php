<?php

declare(strict_types=1);

namespace Engineered\Resource;

use Engineered\HttpClient\HttpClientFacade;
use Engineered\Shared\SharedFacade;
use Gacela\Framework\AbstractDependencyProvider;
use Gacela\Framework\Container\Container;

final class ResourceDependencyProvider extends AbstractDependencyProvider
{

	public const FACADE_HTTP_CLIENT = 'FACADE_HTTP_CLIENT';

	public function provideModuleDependencies(Container $container): void
	{
		$this->addHttpClientFacade($container);
	}

	private function addHttpClientFacade(Container $container) {
		$container->set(
			self::FACADE_HTTP_CLIENT,
			function (Container $container) {
				return $container->getLocator()->get(HttpClientFacade::class);
			}
		);
	}


}
