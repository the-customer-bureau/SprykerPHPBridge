<?php

declare(strict_types=1);

namespace Engineered\Customer;

interface CustomerFacadeInterface
{
    public function getWishLists(string $bearerToken): array;

    public function getWishList(string $wishlistId, string $bearerToken): array;

    public function createWishlist(string $name, string $bearerToken, ?string $returnAttribute = null): array|string;

    public function addToWishlist(string $wishlistId, string $sku, string $bearerToken): array;
}
