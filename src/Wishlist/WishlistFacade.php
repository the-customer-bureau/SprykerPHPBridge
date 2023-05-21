<?php

declare(strict_types=1);

namespace Engineered\Wishlist;

use Gacela\Framework\AbstractFacade;

/**
 * @method WishlistFactory getFactory()
 */
final class WishlistFacade extends AbstractFacade implements WishlistFacadeInterface
{
    public function create(string $name, string $bearerToken): array
    {
        return $this->getFactory()
            ->createWishlist()
            ->create($name, $bearerToken);
    }

    public function add(string $wishlistId, string $sku, string $bearerToken): array
    {
        return $this->getFactory()
            ->createWishlist()
            ->add($wishlistId, $sku, $bearerToken);
    }

    public function get(string $wishlistId, string $bearerToken): array
    {
        return $this->getFactory()
            ->createWishlist()
            ->get($wishlistId, $bearerToken);
    }

    public function getList(string $bearerToken): array
    {
        return $this->getFactory()
            ->createWishlist()
            ->getList($bearerToken);
    }

    public function getName(string $wishlistId, string $bearerToken): string
    {
        return $this->getFactory()
            ->createWishlist()
            ->getName($wishlistId, $bearerToken);
    }

//    public function getItems(string $wishlistId, string $bearerToken): array
//    {
//        return $this->getFactory()->createWishlist()->getItems($wishlistId, $bearerToken);
//    }
}
