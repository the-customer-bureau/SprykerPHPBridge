<?php

declare(strict_types=1);

namespace Engineered\SprykerBridge;

use Engineered\Auth\Enums\TokenReturnAttribute;
use Engineered\Customer\Enums\WishlistsAttribute;
use Gacela\Framework\AbstractFacade;

/**
 * @method SprykerBridgeFactory getFactory()
 */
final class SprykerBridgeFacade extends AbstractFacade
{

	// TODO - use an array to retrieve the includes - MAYBE ACROSS ALL APPLICABLE ENDPOINTS?
	// TODO - Use UNION TYPES to allow selection of returned attributes... do something cool!

	/****
	 *
	 *
	 * AUTH
	 *
	 */



	public function getAccessToken(string $username, string $password, TokenReturnAttribute $returnAttribute = null): array|string
	{
		return $this->getFactory()->getAuthFacade()->getAccessToken($username, $password, $returnAttribute);
	}

	public function refreshTokens(string $refreshToken, TokenReturnAttribute $returnAttribute = null): array|string
	{
		return $this->getFactory()->getAuthFacade()->refreshTokens($refreshToken, $returnAttribute);
	}




	/****
	 *
	 *
	 * CATEGORIES
	 *
	 */

	public function getCategory(int $id): array
	{
		return $this->getFactory()->getResourceFacade()->getCategory($id);

	}

	public function getCategoryTrees(): array
	{
		return $this->getFactory()->getCollectionsFacade()->getCategoryTrees();
	}



	/****
	 *
	 *
	 * PRODUCTS
	 *
	 */



	public function getAbstractProduct(string $sku): array
	{
		return $this->getFactory()->getResourceFacade()->getAbstractProduct($sku);

	}

	public function getRelatedAbstractProducts(string $sku): array
	{
		return $this->getFactory()->getResourceFacade()->getRelatedAbstractProducts($sku);

	}

	public function getConcreteProduct(string $sku): array
	{
		return $this->getFactory()->getResourceFacade()->getConcreteProduct($sku);

	}

	public function searchAbstractProducts(string $searchTerm): array
	{
		return $this->getFactory()->getCollectionsFacade()->searchAbstractProducts($searchTerm);
	}


	/****
	 *
	 *
	 * CARTS
	 *
	 */

	public function getCustomerCarts(string $bearerToken, array $include = null): array
	{
		return $this->getFactory()->getCartFacade()->getCustomerCarts($bearerToken, $include);

	}

	public function addToCustomerCart(string $sku, int $quantity, string $cartId, string $bearerToken): array
	{
		return $this->getFactory()->getCartFacade()->addToCustomerCart($sku, $quantity, $cartId, $bearerToken);

	}

	public function addToGuestCart(string $concreteSku, string $customerUniqueId, int $quantity = 1, string $id = null): array
	{
		return $this->getFactory()->getCartFacade()->addToGuestCart($concreteSku, $quantity, $customerUniqueId, $id);

	}



	/****
	 *
	 *
	 * WISHLISTS
	 *
	 */




	public function getWishlists(string $bearerToken): array
	{
		return $this->getFactory()->getCustomerFacade()->getWishLists($bearerToken);

	}

	public function getWishlist(string $wishlistId, string $bearerToken): array
	{
		return $this->getFactory()->getCustomerFacade()->getWishList($wishlistId, $bearerToken);

	}

	public function createWishlist(string $name, string $bearerToken , WishlistsAttribute $returnAttribute = null): array|string
	{
		return $this->getFactory()->getCustomerFacade()->createWishlist($name, $bearerToken, $returnAttribute);

	}

	public function addToWishlist(string $wishlistId, string $sku, string $bearerToken): array
	{
		return $this->getFactory()->getCustomerFacade()->addToWishlist($wishlistId, $sku, $bearerToken);

	}

}
