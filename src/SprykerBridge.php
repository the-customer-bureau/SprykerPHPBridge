<?php

declare(strict_types=1);

namespace Engineered;

use Engineered\SprykerBridge\SprykerBridgeFacade;
use Gacela\Framework\Bootstrap\GacelaConfig;
use Gacela\Framework\Gacela;

class SprykerBridge
{
    public static function create(string $glueUrl, string $currency = 'EUR', string $store = 'DE'): SprykerBridgeFacade
    {
        // todo - Add lots of Gacela configuration options here that can be initialised via the "create" function parameters.

        Gacela::bootstrap(__DIR__, static function (GacelaConfig $config) use ($glueUrl, $currency, $store): void {
            $config->addAppConfigKeyValue('GLUE_API_URL', $glueUrl);
            $config->addAppConfigKeyValue('GLUE_CURRENCY', $currency);
            $config->addAppConfigKeyValue('GLUE_STORE', $store);
        });

        return new SprykerBridgeFacade();
    }
}
