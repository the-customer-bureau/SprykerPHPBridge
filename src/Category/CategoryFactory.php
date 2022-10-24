<?php

declare(strict_types=1);

namespace Engineered\Category;

use Engineered\Category\Domain\Category;
use Engineered\HttpClient\HttpClientFacadeInterface;
use Gacela\Framework\AbstractFactory;

/**
 * @method CategoryConfig getConfig()
 */
final class CategoryFactory extends AbstractFactory
{

	public function createCategory(): Category
	{
		return new Category($this->getHttpClient());
	}



	private function getHttpClient(): HttpClientFacadeInterface
	{
		return $this->getProvidedDependency(
			CategoryDependencyProvider::FACADE_HTTP_CLIENT
		);
	}

}
