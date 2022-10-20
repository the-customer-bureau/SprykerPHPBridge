<?php

declare(strict_types=1);

namespace Engineered\Customer;

use Gacela\Framework\AbstractFacade;

/**
 * @method CustomerFactory getFactory()
 */
final class CustomerFacade extends AbstractFacade
{

	public function getWishLists(string $bearerToken): array
	{
		return $this->getFactory()->createWishlists()->get($bearerToken);
	}

	public function createWishlist(string $name, string $bearerToken): array
	{
		return $this->getFactory()->createWishlists()->create($name, $bearerToken);
	}
}
