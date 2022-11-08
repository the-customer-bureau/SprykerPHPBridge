# SprykerPHPBridge
## A PHP wrapper for the Spryker Glue API.
> Written in PHP using [Gacela](https://github.com/gacela-project/gacela)

### Q. So what does this do and why is it useful?

A. This package allows you to easily interact with the Spryker Glue API in your 3rd party PHP Application.

### Q. So... erm... why? Why not just use Spryker...? It's already a great PHP application!

A. Well we know...! But this package allows you to use Spryker data in any PHP Application...!


### Installation (once published on packagist.org)

```bash
composer require engineered/sprykerphpbridge
```



### Example

```php

<?php

require __DIR__ . '/vendor/autoload.php';

// Change YOUR_GLUE_URL to something like: 'https://glue.de.b2c.demo-spryker.com'
$sprykerBridge = SprykerBridge::create(YOUR_GLUE_URL);


// grab the category trees:
$categoryTress = $sprykerBridge->category()->getTrees();

// grab a single category
$category = $sprykerBridge->category()->get(4);

// grab products
$abstractProduct = $sprykerBridge->abstractProduct()->get(202);
$concreteProduct = $sprykerBridge->concreteProduct()->get("209_12554247");
$relatedProducts = $sprykerBridge->abstractProduct()->getRelated(202);

// even search products
$sprykerBridge->abstractProduct()->search('NEX-VG20EH');

// getting more advanced:

// Login and return the Bearer Token for protected requests.
$bearerToken = $sprykerBridge->auth()->getAccessToken('sonia@spryker.com', 'change123');

// with your bearer token, you can now do things like, create a wishlist...
$name = uniqid('my wishlist');

$newWishList = $sprykerBridge->wishlist()->create($name, $token);

// now we can add a concrete product to the wishlist
$addToWishlist = $sprykerBridge->wishlist()->add($newWishList['data']['id'], '209_12554247', $token);

// and then retrieve the wishlist
$wishList = $sprykerBridge->wishlist()->get($newWishList['data']['id'], $token);



// we can even add to cart! (checkout coming next!)

$sprykerBridge->addToGuestCart('209_12554247', $uid, 4, null, GuestCartReturnAttribute::totals_discountTotal);

```

## Git Hooks

You can verify all your commits will pass the CI (coding guidelines, static analyzers, and tests) by enabling the git
pre-commit hook that will trigger all of them before creating a new commit. Don't worry, it usually takes a couple of
seconds.

You can add the git hook running the following bash script:

```bash
$ ./tools/git-hooks/init.sh
```

You can always use the `--no-verify` to bypass the git hook:
> git commit -m 'your message' --no-verify

But I like to use them by default to catch potential easy-to-check mistakes.
