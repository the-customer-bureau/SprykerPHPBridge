<?php

require '../vendor/autoload.php';

use Engineered\SprykerBridge;

// here we are using the live Spryker demo for convenience
$sprykerBridge = SprykerBridge::create('https://glue.de.b2c.demo-spryker.com');

// grab the category trees:
$categoryTress = $sprykerBridge->category()->getTrees();

// grab a single category
$category = $sprykerBridge->category()->get(3);

// grab products
$abstractProduct = $sprykerBridge->abstractProduct()->get(202);
$concreteProduct = $sprykerBridge->concreteProduct()->get("209_12554247");
$relatedProducts = $sprykerBridge->abstractProduct()->getRelated(202);

// even search products
$searchResults = $sprykerBridge->abstractProduct()->search('NEX-VG20EH');

// getting more advanced:

// Login and return the Bearer Token for protected requests.
$bearerToken = $sprykerBridge->auth()->getAccessToken('sonia@spryker.com', 'change123');

// with your bearer token, you can now do things like, create a wishlist...
$name = uniqid('my wishlist', true);

$newWishList = $sprykerBridge->wishlist()->create($name, $bearerToken);

// now we can add a concrete product to the wishlist
$addToWishlist = $sprykerBridge->wishlist()->add($newWishList['data']['id'], '209_12554247', $bearerToken);

// and then retrieve the wishlist
$wishList = $sprykerBridge->wishlist()->get($newWishList['data']['id'], $bearerToken);


// the library gives you an easy way to generate an X-Anonymous-Customer-Unique-Id
$uniqueId = $sprykerBridge->customer()->generateCustomerUniqueId();

// we can even add to cart!
$addToCartResponse = $sprykerBridge->cart()->addToGuestCart('038_25905593', 1, $uniqueId);


// how about checkout?

// we've given you a handy post data builder...
// send in your customer, address, billing and shipment data as arrays,
// and the bridge will give you nicely formatted POST data ready to send to Spryker for checkout.

$customer       = [
	"salutation" => "Mr",
	"email"      => "spencor.hopkin@spryker.com",
	"firstName"  => "Spencor",
	"lastName"   => "Hopkin"

];
$billingAddress = [
	"salutation" => "Mr",
	"firstName"  => "Spencor",
	"lastName"   => "Hopkin",
	"address1"   => "Julie-Wolfthorn-Straße",
	"address2"   => "1",
	"address3"   => "new address",
	"zipCode"    => "10115",
	"city"       => "Berlin",
	"iso2Code"   => "DE",
	"company"    => "spryker",
	"phone"      => "+49 (30) 2084 98350"
];

$payments = [
	[
		'paymentMethodName'   => 'Credit Card',
		'paymentProviderName' => 'DummyPayment',
	],
];

$shipments = [
	[
		'items'                 => [
			0 => '038_25905593',
		],
		'shippingAddress'       => [
			'id'         => null,
			'salutation' => 'Mr',
			'firstName'  => 'Spencor',
			'lastName'   => 'Hopkin',
			'address1'   => 'Urbanstraße',
			'address2'   => '119',
			'address3'   => 'Spencor\'s address',
			'zipCode'    => '10967',
			'city'       => 'Berlin',
			'iso2Code'   => 'DE',
			'company'    => 'spryker',
			'phone'      => '+49 (30) 2084 98350',
		],
		'idShipmentMethod'      => 1,
		'requestedDeliveryDate' => '2022-09-29'
	],
];

// the buildCheckoutPostData method, takes some of the pain away from formatting the data required for the checkout:
$postData = $sprykerBridge->checkout()->buildCheckoutPostData($addToCartResponse['data']['id'], $customer, $billingAddress, $payments, $shipments);

// checking out is as easy as one line of code:
$checkout = $sprykerBridge->checkout()->guestCheckout($uniqueId, $postData);



try
{
	echo json_encode($categoryTress, JSON_THROW_ON_ERROR);
	echo json_encode($category, JSON_THROW_ON_ERROR);
	echo json_encode($abstractProduct, JSON_THROW_ON_ERROR);
	echo json_encode($concreteProduct, JSON_THROW_ON_ERROR);
	echo json_encode($relatedProducts, JSON_THROW_ON_ERROR);
	echo json_encode($searchResults, JSON_THROW_ON_ERROR);
	echo json_encode($bearerToken, JSON_THROW_ON_ERROR);
	echo json_encode($newWishList, JSON_THROW_ON_ERROR);
	echo json_encode($addToCartResponse, JSON_THROW_ON_ERROR);
	echo json_encode($postData, JSON_THROW_ON_ERROR);
	echo json_encode($checkout, JSON_THROW_ON_ERROR);
}
catch (JsonException $e)
{
	echo $e;
}
