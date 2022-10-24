<?php

declare(strict_types=1);

namespace Engineered\Category;

use Gacela\Framework\AbstractFacade;

/**
 * @method CategoryFactory getFactory()
 */
final class CategoryFacade extends AbstractFacade
{

	public function get(int $id): array
	{
		return $this->getFactory()
			->createCategory()
			->get($id);
	}

	public function getTree(): array
	{
		return $this->getFactory()
			->createCategory()
			->getTree();
	}

}
