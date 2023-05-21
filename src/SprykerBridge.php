<?php

declare(strict_types=1);

namespace Engineered;

use Engineered\SprykerBridge\SprykerBridgeFacade;
use Gacela\Framework\Bootstrap\GacelaConfig;
use Gacela\Framework\Gacela;

final class SprykerBridge
{
    private static ?self $instance = null;

    /**
     * @param array{
     *   GLUE_API_URL?: string,
     *   GLUE_CURRENCY?: string,
     *   GLUE_STORE?: string,
     *   ROOT_DIR?: string,
     * } $configKeyValues
     */
    public function __construct(array $configKeyValues = [])
    {
        $this->gacelaBootstrap($configKeyValues);
    }

    public static function create(string $glueUrl, string $currency = 'EUR', string $store = 'DE'): SprykerBridgeFacade
    {
        if (self::$instance === null) {
            $configKeyValues = [
                'GLUE_API_URL' => $glueUrl,
                'GLUE_CURRENCY' => $currency,
                'GLUE_STORE' => $store,
                'ROOT_DIR' => getcwd() ?: __DIR__ . '/..',
            ];
            self::$instance = new self($configKeyValues);
        }

        return self::$instance->facade();
    }

    public function facade(): SprykerBridgeFacade
    {
        return new SprykerBridgeFacade();
    }

    private function gacelaBootstrap(array $configKeyValues): void
    {
        Gacela::bootstrap(
            $configKeyValues['ROOT_DIR'] ?? (getcwd() ?: __DIR__ . '/..'),
            static function (GacelaConfig $config) use ($configKeyValues): void {
                $config
                    ->enableFileCache()
                    ->addAppConfigKeyValues($configKeyValues);
            }
        );
    }
}
