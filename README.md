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


// an easy way to generate an X-Anonymous-Customer-Unique-Id
$uniqueId = $sprykerBridge->customer()->generateCustomerUniqueId();

// we can even add to cart!
$addToCartResponse = $sprykerBridge->cart()->addToGuestCart('038_25905593', 1, $uniqueId);


// how about checkout?

// we've given you a handy post data builder...
// send in your customer, address, billing and shipment data as arrays,
// and the bridge will give you nicely formatted POST data ready to send to Spryker for checkout.
$postData = $sprykerBridge->checkout()->buildCheckoutPostData($addToCartResponse['data']['id'], $customer, $billingAddress, $payments, $shipments);

// checking out is as easy as one line of code:
$checkout = $sprykerBridge->checkout()->guestCheckout($uniqueId, $postData);
```

## Development with Docker (Optional)

Just by having docker installed and running `make` on the root of the project, you'll have 
everything you need for development. Every developer will have the same PHP and Composer versions.

This command does the following:
- Builds the required docker images with the required binaries for development (php, composer 
  and other stuff)
- Installs dependencies with composer
- Setups the git hooks
- Boots the development stack

By default, the PHP container executes a dummy long-running process, so the container is always up 
and running. You can configure a remote interpreter in PHPStorm that points to that running
container to run test suites and get code analysis.

When you are done working, `make stop` is your best friend.

You can still use your own PHP version, but then you risk your changes to be rejected due to
incompatibility or having issues installing / upgrading dependencies.

### Running Commands

There are predefines commands on the Makefile to run the most common tasks.

You can run `make pr` to get feedback on the overall quality of your code. You can also run 
`make statica` to run the static analysis, `make fmt` to format the code according to the PHP CS 
Fixer standards defined in the project, or `make test` to run the test suite. All these run on
the docker stack, so make sure your services are up and running with `make boot`.

If you want to install a package or run a specific command, is best to do so through the docker 
stack. So a composer install would look like this:

```bash
docker-compose exec lib composer install
```

This is quite long to type, so there are two alternatives:

First, you can create an alias for `docker-compose`, like `dc`

```bash
dc exec lib composer install
```

Another option is to run `make shell` and open a shell directly into the container. Then you can
run the commands as if you were in your machine:

```ash
composer install
```

### Git Hooks

The git hooks validate that your code is good to merge. By default, a pre-commit hook is installed
that runs `make pr` every time you commit.

You can always use the `--no-verify` flag to bypass the git hook:

> git commit -m 'your message' --no-verify

But I like to use them by default to catch potential easy-to-check mistakes.