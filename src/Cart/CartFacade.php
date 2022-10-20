<?php

declare(strict_types=1);

namespace Engineered\Cart;

use Gacela\Framework\AbstractFacade;

/**
 * @method CartFactory getFactory()
 */
final class CartFacade extends AbstractFacade
{

	public function addToGuestCart(string $concreteSku, int $quantity, string $customerUniqueId, string $id = null): array
	{
		return $this->getFactory()->createGuestCartItems()->add($concreteSku,  $quantity,  $customerUniqueId, $id);
	}
}
