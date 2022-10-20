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
$result = $sprykerBridge->getConcreteProduct("209_12554247");
//$result = $sprykerBridge->searchAbstractProducts('toshiba');
//$result = $sprykerBridge->getAccessToken('sonia@spryker.com', 'change123');
//echo json_encode($result['data']['attributes']['refreshToken']);
//
//$result = $sprykerBridge->refreshTokens($result['data']['attributes']['refreshToken']);


//$result = $sprykerBridge->addToGuestCart('206_6429825', '111-222-333', 4);

echo json_encode($result);
