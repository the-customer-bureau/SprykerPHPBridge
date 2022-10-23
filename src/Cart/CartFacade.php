<?php

declare(strict_types=1);

namespace Engineered\Cart;

use Gacela\Framework\AbstractFacade;

/**
 * @method CartFactory getFactory()
 */
final class CartFacade extends AbstractFacade
{

	public function addToGuestCart(string $concreteSku, int $quantity, string $customerUniqueId, string $id = null, ?string $returnAttribute = null): array|string
	{
		return $this->getFactory()
			->createGuestCartItems()
			->add($concreteSku,  $quantity,  $customerUniqueId, $id, $returnAttribute);
	}

	public function getCustomerCarts(string $bearerToken, array $include = null, ?string $returnAttribute = null): array
	{
		return $this->getFactory()
			->createCustomerCarts()
			->get($bearerToken, $include, $returnAttribute);
	}

	public function addToCustomerCart(string $concreteSku, int $quantity, string $cartId, string $bearerToken): array
	{
		return $this->getFactory()
			->createCustomerCarts()
			->addToCustomersCart($concreteSku, $quantity, $cartId, $bearerToken);
	}
}
