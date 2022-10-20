<?php


namespace Engineered\Collections\Domain;

use Engineered\HttpClient\HttpClientFacade;


class AbstractProducts
{


	public function __construct(
		public HttpClientFacade $httpClient
	)
	{
	}


	public function get(string $searchTerm): array
	{
		return [];
//		return $this->httpClient->getHttpClient()->request('GET', $this->glueApiUrl . '/catalog-search?q='. $searchTerm)->toArray();
	}


}
