<?php

declare(strict_types=1);

namespace Engineered\Cart;

use Engineered\Cart\Domain\GuestCart;
use Engineered\Cart\Domain\GuestCartItems;
use Engineered\HttpClient\HttpClientFacade;

use Gacela\Framework\AbstractFactory;

/**
 * @method CartConfig getConfig()
 */
final class CartFactory extends AbstractFactory
{

	public function createGuestCartItems(): GuestCartItems
	{
		return new GuestCartItems(
			$this->getHttpClient()
		);
	}


	private function getHttpClient(): HttpClientFacade
	{
		return $this->getProvidedDependency(
			CartDependencyProvider::FACADE_HTTP_CLIENT
		);
	}

}
