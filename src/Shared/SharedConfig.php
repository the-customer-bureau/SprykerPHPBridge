<?php

declare(strict_types=1);

namespace Engineered\Shared;

use Gacela\Framework\AbstractConfig;

final class SharedConfig extends AbstractConfig
{

	public function getGlueUrl(): string
	{

		return $this->get('GLUE_API_URL');

	}
}
