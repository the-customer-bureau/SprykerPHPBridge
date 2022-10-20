<?php

declare(strict_types=1);

namespace Engineered\Customer;

use Engineered\Customer\Enums\WishlistsAttribute;
use Gacela\Framework\AbstractFacade;

/**
 * @method CustomerFactory getFactory()
 */
final class CustomerFacade extends AbstractFacade
{

	public function getWishLists(string $bearerToken): array
	{
		return $this->getFactory()->createWishlists()->getList($bearerToken);
	}

	public function getWishList(string $wishlistId, string $bearerToken): array
	{
		return $this->getFactory()->createWishlists()->get( $wishlistId, $bearerToken);
	}

	public function createWishlist(string $name, string $bearerToken, WishlistsAttribute $returnAttribute = null):  array|string
	{
		return $this->getFactory()->createWishlists()->create($name, $bearerToken, $returnAttribute);
	}

	public function addToWishlist(string $wishlistId, string $sku, string $bearerToken): array
	{
		return $this->getFactory()->createWishlists()->add($wishlistId, $sku, $bearerToken);
	}
}
