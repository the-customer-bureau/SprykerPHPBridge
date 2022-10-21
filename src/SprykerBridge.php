<?php

namespace Engineered;

use Engineered\SprykerBridge\SprykerBridgeFacade;
use Gacela\Framework\Bootstrap\GacelaConfig;
use Gacela\Framework\Bootstrap\SetupGacela;
use Gacela\Framework\Config\Config;

class SprykerBridge
{

	public static function create(string $glueUrl): SprykerBridgeFacade
	{

		// todo - Add lots of Gacela configuration options here that can be initialised via the "create" function parameters.

		$config = new GacelaConfig();
		$config->addAppConfigKeyValue('GLUE_API_URL', $glueUrl);
		$setup = SetupGacela::fromGacelaConfig($config);

		Config::getInstance()
			->setSetup($setup)
			->init();

		return new SprykerBridgeFacade();

	}


}
