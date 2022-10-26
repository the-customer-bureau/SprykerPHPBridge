<?php

declare(strict_types=1);

namespace Engineered\Cart;

interface CartFacadeInterface
{
    public function addToGuestCart(string $concreteSku, int $quantity, string $customerUniqueId): array;

    public function getCustomerCarts(string $customerId, string $bearerToken, array $include = null): array;

    public function addToCustomerCart(string $concreteSku, int $quantity, string $bearerToken, string $cartId = null): array;
}
