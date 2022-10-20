<?php

use Gacela\Framework\Bootstrap\GacelaConfig;
use Gacela\Framework\Gacela;
use Engineered\SprykerBridge\SprykerBridgeFacade;

require __DIR__ . '/vendor/autoload.php';

$sprykerBridge = new SprykerBridgeFacade();

Gacela::bootstrap(__DIR__, GacelaConfig::withPhpConfigDefault());

//$result = $sprykerBridge->getCategoryTrees();
//$result = $sprykerBridge->getCategory(4);
//$result = $sprykerBridge->getAbstractProduct(208);
//$result = $sprykerBridge->getRelatedAbstractProducts(202);
//$result = $sprykerBridge->getConcreteProduct("209_12554247");
//$result = $sprykerBridge->searchAbstractProducts('NEX-VG20EH');


$result = $sprykerBridge->getAccessToken('sonia@spryker.com', 'change123');

$bearerToken = $result['data']['attributes']['accessToken'];

$name = uniqid('my wishlist');

$result = $sprykerBridge->createWishlist($name, $bearerToken);

$result = $sprykerBridge->getWishlists($bearerToken);

//$result = $sprykerBridge->getCustomerCarts($bearerToken);
//
//$result = $sprykerBridge->addToCustomerCart('209_12554247', 3, $result['data'][0]['id'], $bearerToken);


echo json_encode($result);
