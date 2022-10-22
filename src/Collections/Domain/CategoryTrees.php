<?php


namespace Engineered\Collections\Domain;

use Engineered\HttpClient\HttpClientFacadeInterface;

class CategoryTrees
{

	public const CATEGORY_TREES_ENDPOINT = 'category-trees';


	public function __construct(
		private HttpClientFacadeInterface $httpClient,
	)
	{
	}


	public function get(): array
	{
		return $this->httpClient->get(self::CATEGORY_TREES_ENDPOINT);
	}


}
