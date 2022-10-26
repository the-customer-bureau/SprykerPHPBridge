<?php

declare(strict_types=1);

namespace Engineered\Cart;

use Gacela\Framework\AbstractFacade;

/**
 * @method CartFactory getFactory()
 */
final class CartFacade extends AbstractFacade implements CartFacadeInterface
{
    public function addToGuestCart(string $concreteSku, int $quantity, string $customerUniqueId): array
    {
        return $this->getFactory()
            ->createGuestCartItems()
            ->add($concreteSku, $quantity, $customerUniqueId);
    }

    public function getCustomerCarts(string $customerId, string $bearerToken, array $include = null): array
    {
        return $this->getFactory()
            ->createCustomerCarts()
            ->get($customerId, $bearerToken);
    }

    public function addToCustomerCart(string $concreteSku, int $quantity, string $bearerToken, string $cartId = null): array
    {
        return $this->getFactory()
            ->createCustomerCarts()
            ->addToCustomersCart($concreteSku, $quantity, $bearerToken, $cartId);
    }
}
