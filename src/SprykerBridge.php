<?php

declare(strict_types=1);

namespace Engineered;

use Engineered\SprykerBridge\SprykerBridgeFacade;
use Gacela\Framework\Bootstrap\GacelaConfig;
use Gacela\Framework\Gacela;

final class SprykerBridge
{
    public static function create(
        string $glueUrl,
        string $currency = 'EUR',
        string $store = 'DE'
    ): SprykerBridgeFacade {
        $configKeyValues = [
            'GLUE_API_URL' => $glueUrl,
            'GLUE_CURRENCY' => $currency,
            'GLUE_STORE' => $store,
        ];

        $appRootDir = getcwd() ?: __DIR__ . '/..';

        Gacela::bootstrap($appRootDir, static function (GacelaConfig $config) use ($configKeyValues): void {
            $config->enableFileCache();
            $config->addAppConfigKeyValues($configKeyValues);
        });

        return new SprykerBridgeFacade();
    }
}
