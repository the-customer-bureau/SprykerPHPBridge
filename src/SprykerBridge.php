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
        $configKeyValues = [
            'GLUE_API_URL' => $glueUrl,
            'GLUE_CURRENCY' => $currency,
            'GLUE_STORE' => $store,
        ];

        Gacela::bootstrap(__DIR__, static function (GacelaConfig $config) use ($configKeyValues): void {
            $config->addAppConfigKeyValues($configKeyValues);
        });

        return new SprykerBridgeFacade();
    }
}
