<?php

namespace Engineered\Resource\Domain;

use Engineered\HttpClient\HttpClientFacadeInterface;

class Category
{

	private const CATEGORY_NODES_ENDPOINT = 'category-nodes';

	public function __construct(
		public readonly HttpClientFacadeInterface $httpClient
	)
	{
	}

	public function get(int $id): array
	{
		return $this->httpClient->get(self::CATEGORY_NODES_ENDPOINT . '/' .$id);

	}

}
