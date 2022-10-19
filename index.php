<?php

use Gacela\Framework\Bootstrap\GacelaConfig;
use Gacela\Framework\Gacela;
use Engineered\SprykerBridge\SprykerBridgeFacade;

require __DIR__ . '/vendor/autoload.php';

$sprykerBridge = new SprykerBridgeFacade();

Gacela::bootstrap(__DIR__, GacelaConfig::withPhpConfigDefault());

echo json_encode($sprykerBridge->getCategoryTrees());
