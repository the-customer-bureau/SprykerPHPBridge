<?php

declare(strict_types=1);

namespace Engineered\Wishlist;

/**
 * @method WishlistFactory getFactory()
 */
interface WishlistFacadeInterface
{
    public function create(string $name, string $bearerToken): array;
    public function add(string $wishlistId, string $sku, string $bearerToken): array;
    public function get(string $wishlistId, string $bearerToken): array;
    public function getList(string $bearerToken): array;
    public function getName(string $wishlistId, string $bearerToken): string;
//    public function getItems(string $wishlistId, string $bearerToken): array;
}
