<?php


namespace Engineered\Collections\Domain;


use Engineered\Shared\SharedFacade;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class CategoryTrees
{


	public function __construct(
		public SharedFacade $httpClient,
		public              $glueApiUrl
	)
	{
	}

	/**
	 * @throws TransportExceptionInterface
	 * @throws ServerExceptionInterface
	 * @throws RedirectionExceptionInterface
	 * @throws DecodingExceptionInterface
	 * @throws ClientExceptionInterface
	 */
	public function get(): array
	{

		return $this->httpClient->getHttpClient()->request('GET', $this->glueApiUrl . '/category-trees')->toArray();

	}



//
//	/**
//	 * @param   ClientConnector  $clientConnector
//	 * @param   bool             $full
//	 */
//
//	public function __construct(ClientConnector $clientConnector,public bool $full)
//	{
//
//		parent::__construct($clientConnector);
//
//		$this->url        = $this->setUrl();
//
//
//	}
//
//	/**
//	 * @return string
//	 */
//	public function setUrl(): string
//	{
//		return '/category-trees';
//	}
//
//	/**
//	 * @return array
//	 * @throws ClientExceptionInterface
//	 * @throws DecodingExceptionInterface
//	 * @throws RedirectionExceptionInterface
//	 * @throws ServerExceptionInterface
//	 * @throws TransportExceptionInterface
//	 */
//
//	public function get(): array
//	{
//
//		$result = parent::get();
//
//		if ($this->full)
//		{
//			return $result;
//		}
//
//		return $result['data'][0]['attributes']['categoryNodesStorage'];
//
//
//	}


}
