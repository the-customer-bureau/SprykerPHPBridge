<?php

namespace Engineered\Customer\Domain;

use Engineered\HttpClient\HttpClientFacadeInterface;

class Wishlist
{

	public const WISHLISTS_ENDPOINT = 'wishlists';


	public function __construct(
		public readonly HttpClientFacadeInterface $httpClient,
	)
	{
	}

}
