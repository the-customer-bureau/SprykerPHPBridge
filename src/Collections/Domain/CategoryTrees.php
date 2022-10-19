<?php


namespace Engineered\Collections\Domain;

use Engineered\Shared\SharedFacade;

class CategoryTrees
{


	public function __construct(
		public SharedFacade $httpClient,
		public string       $glueApiUrl
	)
	{
	}


	public function get(): array
	{
		return $this->httpClient->getHttpClient()->request('GET', $this->glueApiUrl . '/category-trees')->toArray();
	}


}
