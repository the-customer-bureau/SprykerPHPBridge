<?php

declare(strict_types=1);

namespace Engineered\SprykerBridge;

use Engineered\Auth\AuthFacadeInterface;
use Engineered\Cart\CartFacadeInterface;
use Engineered\Collections\CollectionsFacadeInterface;
use Engineered\Customer\CustomerFacadeInterface;
use Engineered\Resource\ResourceFacadeInterface;
use Gacela\Framework\AbstractFacade;

/**
 * @method SprykerBridgeFactory getFactory()
 */
final class SprykerBridgeFacade extends AbstractFacade
{
    /****
     *
     *
     * AUTH
     *
     */

    public function getAccessToken(string $username, string $password, ?string $returnAttribute = null): array|string
    {
        return $this->getFactory()
            ->getAuthFacade()
            ->getAccessToken($username, $password, $returnAttribute);
    }

    public function refreshTokens(string $refreshToken, ?string $returnAttribute = null): array|string
    {
        return $this->getFactory()
            ->getAuthFacade()
            ->refreshTokens($refreshToken, $returnAttribute);
    }

    /****
     *
     *
     * CATEGORIES
     *
     */

    public function getCategory(int $id): array
    {
        return $this->getFactory()
            ->getResourceFacade()
            ->getCategory($id);
    }

    public function getCategoryTrees(): array
    {
        return $this->getFactory()
            ->getCollectionsFacade()
            ->getCategoryTrees();
    }

    /****
     *
     *
     * PRODUCTS
     *
     */

    public function getAbstractProduct(string $sku): array
    {
        return $this->getFactory()
            ->getResourceFacade()
            ->getAbstractProduct($sku);
    }

    public function getRelatedAbstractProducts(string $sku): array
    {
        return $this->getFactory()
            ->getResourceFacade()
            ->getRelatedAbstractProducts($sku);
    }

    public function getConcreteProduct(string $sku): array
    {
        return $this->getFactory()
            ->getResourceFacade()
            ->getConcreteProduct($sku);
    }

    public function searchAbstractProducts(string $searchTerm): array
    {
        return $this->getFactory()
            ->getCollectionsFacade()
            ->searchAbstractProducts($searchTerm);
    }

    /****
     *
     *
     * CARTS
     *
     */

    public function getCustomerCarts(string $bearerToken, array $include = null, ?string $returnAttribute = null): array|string
    {
        return $this->getFactory()
            ->getCartFacade()
            ->getCustomerCarts($bearerToken, $include, $returnAttribute);
    }

    public function addToCustomerCart(string $sku, int $quantity, string $cartId, string $bearerToken): array
    {
        return $this->getFactory()
            ->getCartFacade()
            ->addToCustomerCart($sku, $quantity, $cartId, $bearerToken);
    }

    public function addToGuestCart(
        string $concreteSku,
        string $customerUniqueId,
        int $quantity = 1,
        string $id = null,
        ?string $returnAttribute = null
    ): array|string {
        return $this->getFactory()
            ->getCartFacade()
            ->addToGuestCart(
                $concreteSku,
                $quantity,
                $customerUniqueId,
                $id,
                $returnAttribute
            );
    }

    /****
     *
     *
     * WISHLISTS
     *
     */

    public function getWishlists(string $bearerToken): array
    {
        return $this->getFactory()
            ->getCustomerFacade()
            ->getWishLists($bearerToken);
    }

    public function getWishlist(string $wishlistId, string $bearerToken): array
    {
        return $this->getFactory()
            ->getCustomerFacade()
            ->getWishList($wishlistId, $bearerToken);
    }

    public function createWishlist(string $name, string $bearerToken, ?string $returnAttribute = null): array|string
    {
        return $this->getFactory()
            ->getCustomerFacade()
            ->createWishlist($name, $bearerToken, $returnAttribute);
    }

    public function addToWishlist(string $wishlistId, string $sku, string $bearerToken): array
    {
        return $this->getFactory()
            ->getCustomerFacade()
            ->addToWishlist($wishlistId, $sku, $bearerToken);
    }

    /****
     *
     *
     * NEW API?
     *
     */

    public function resource(): ResourceFacadeInterface
    {
        return $this->getFactory()->getResourceFacade();
    }

    public function collections(): CollectionsFacadeInterface
    {
        return $this->getFactory()->getCollectionsFacade();
    }

    public function customer(): CustomerFacadeInterface
    {
        return $this->getFactory()->getCustomerFacade();
    }

    public function cart(): CartFacadeInterface
    {
        return $this->getFactory()->getCartFacade();
    }

    public function auth(): AuthFacadeInterface
    {
        return $this->getFactory()->getAuthFacade();
    }
}
