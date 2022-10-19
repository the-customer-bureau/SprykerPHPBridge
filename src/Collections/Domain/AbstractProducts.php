<?php


namespace Engineered\Collections\Domain;

use Engineered\Shared\SharedFacade;

class AbstractProducts
{


	public function __construct(
		public SharedFacade $httpClient,
		public string       $glueApiUrl
	)
	{
	}


	public function get(string $searchTerm): array
	{
		return $this->httpClient->getHttpClient()->request('GET', $this->glueApiUrl . '/catalog-search?q='. $searchTerm)->toArray();
	}


}
