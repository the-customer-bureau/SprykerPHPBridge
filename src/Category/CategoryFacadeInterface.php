<?php

namespace Engineered\Category;


/**
 * @method CategoryFactory getFactory()
 */
interface CategoryFacadeInterface
{
	public function get(int $id): array;

	public function getTree(): array;
}
