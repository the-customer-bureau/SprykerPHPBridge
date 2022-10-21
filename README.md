# SprykerPHPBridge
## A PHP wrapper for the Spryker Glue API.
> Written in PHP using [Gacela](https://github.com/gacela-project/gacela)

### Q. So what does this do and why is it useful?

A. This package allows you to easily interact with the Spryker Glue API in your 3rd party PHP Application.

### Q. So... erm... why? Why not just use Spryker...? It's already a great PHP application!

A. Well we know...! But this package allows you to use Spryker data in any PHP Application... like WordPress, Joomla, Drupal or even Laraval.


### Installation (once published on packagist.org)

```bash
composer require engineered/sprykerphpbridgegacela
```



### Example

```php

<?php

require __DIR__ . '/vendor/autoload.php';

// Change YOUR_GLUE_URL to something like: 'https://glue.de.b2c.demo-spryker.com'
$sprykerBridge = SprykerBridge::create(YOUR_GLUE_URL);


// grab the category trees:
$categoryTress = $sprykerBridge->getCategoryTrees();

// grab a single category
$category = $sprykerBridge->getCategory(4);

// grab products
$abstractProduct = $sprykerBridge->getAbstractProduct(202);
$concreteProduct = $sprykerBridge->getConcreteProduct("209_12554247");
$relatedProducts = $sprykerBridge->getRelatedAbstractProducts(202);

// even search products
$sprykerBridge->searchAbstractProducts('NEX-VG20EH');

// getting more advanced:

// Login and return the Bearer Token for protected requests.
$bearerToken = $sprykerBridge->getAccessToken('sonia@spryker.com', 'change123', TokenReturnAttribute::accessToken);

// with your bearer token, you can now do things like, create a wishlist...
$name = uniqid('my wishlist');

$wishListId = $sprykerBridge->createWishlist($name, $bearerToken);

// ... and the API allows you to specify what gets returned by using the supplied Enums.
// This code will return the ID directly as a string, rather than the entire response.
$name = uniqid('my wishlist');

$wishListId = $sprykerBridge->createWishlist($name, $bearerToken, WishlistsAttribute::id);

// we can easily add to the wishlist:
$sprykerBridge->addToWishlist($wishListId, '209_12554247', $bearerToken);


// we can even add to cart and checkout (coming next)

$sprykerBridge->addToGuestCart('209_12554247', $uid, 4, null, GuestCartReturnAttribute::totals_discountTotal);

```
