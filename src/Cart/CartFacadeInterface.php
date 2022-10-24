<?php

declare(strict_types=1);

namespace Engineered\Cart;

interface CartFacadeInterface
{
    public function addToGuestCart(
        string $concreteSku,
        int $quantity,
        string $customerUniqueId,
        string $id = null,
        ?string $returnAttribute = null
    ): array|string;

    public function getCustomerCarts(
        string $bearerToken,
        array $include = null,
        ?string $returnAttribute = null
    ): array|string;

    public function addToCustomerCart(string $concreteSku, int $quantity, string $cartId, string $bearerToken): array;
}
