<?php

use Gacela\Framework\Bootstrap\GacelaConfig;
use Gacela\Framework\Gacela;
use Engineered\SprykerBridge\SprykerBridgeFacade;

require __DIR__ . '/vendor/autoload.php';

$sprykerBridge = new SprykerBridgeFacade();

Gacela::bootstrap(__DIR__, GacelaConfig::withPhpConfigDefault());

//$result = $sprykerBridge->getCategoryTrees();
//$result = $sprykerBridge->searchAbstractProducts('toshiba');
$result = $sprykerBridge->getAccessToken('sonia@spryker.com', 'change123');
echo json_encode($result);
