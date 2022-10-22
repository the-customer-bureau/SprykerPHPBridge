<?php


namespace Engineered\Collections\Domain;

use Engineered\HttpClient\HttpClientFacadeInterface;


class AbstractProducts
{

	public const ABSTRACT_PRODUCT_SEARCH_ENDPOINT = 'catalog-search?q=';


	public function __construct(
        private HttpClientFacadeInterface $httpClient
	)
	{
	}


	public function get(string $searchTerm): array
	{
		return $this->httpClient->get(self::ABSTRACT_PRODUCT_SEARCH_ENDPOINT . $searchTerm);
	}


}
