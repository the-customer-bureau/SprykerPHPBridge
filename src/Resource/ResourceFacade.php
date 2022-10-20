<?php

declare(strict_types=1);

namespace Engineered\Resource;

use Gacela\Framework\AbstractFacade;

/**
 * @method ResourceFactory getFactory()
 */
final class ResourceFacade extends AbstractFacade
{

	public function getCategory(int $id): array
	{
		return $this->getFactory()->createCategory()->get($id);
	}
}
