<?php

declare(strict_types=1);

namespace Engineered\Wishlist;

use Engineered\HttpClient\HttpClientFacadeInterface;
use Engineered\Wishlist\Domain\Wishlist;
use Gacela\Framework\AbstractFactory;

/**
 * @method WishlistConfig getConfig()
 */
final class WishlistFactory extends AbstractFactory
{
    public function createWishlist(): Wishlist
    {
        return new Wishlist($this->getHttpClient());
    }

    private function getHttpClient(): HttpClientFacadeInterface
    {
        return $this->getProvidedDependency(
            WishlistDependencyProvider::FACADE_HTTP_CLIENT
        );
    }
}
