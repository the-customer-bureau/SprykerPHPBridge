<?php

declare(strict_types=1);

namespace Engineered\Resource;

use Engineered\HttpClient\HttpClientFacade;
use Engineered\Resource\Domain\Category;
use Engineered\Shared\SharedDependencyProvider;
use Gacela\Framework\AbstractFactory;

/**
 * @method ResourceConfig getConfig()
 */
final class ResourceFactory extends AbstractFactory
{


	public function createCategory(): Category
	{
		return new Category($this->getHttpClient());
	}

	private function getHttpClient(): HttpClientFacade
	{
		return $this->getProvidedDependency(
			ResourceDependencyProvider::FACADE_HTTP_CLIENT
		);
	}


}
