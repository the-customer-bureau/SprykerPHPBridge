<?php

namespace Engineered;

use Engineered\SprykerBridge\SprykerBridgeFacade;
use Gacela\Framework\Bootstrap\GacelaConfig;
use Gacela\Framework\Gacela;

class SprykerBridge
{

	public static function create(string $glueUrl): SprykerBridgeFacade
	{

		// todo - Add lots of Gacela configuration options here that can be initialised via the "create" function parameters.

		Gacela::bootstrap(__DIR__, static function (GacelaConfig $config) use ($glueUrl) {
			$config->addAppConfigKeyValue('GLUE_API_URL', $glueUrl);
		});


		return new SprykerBridgeFacade();

	}


}
