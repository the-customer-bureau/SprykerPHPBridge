<?php

declare(strict_types=1);

namespace Engineered\Category;

use Gacela\Framework\AbstractFacade;

/**
 * @method CategoryFactory getFactory()
 */
final class CategoryFacade extends AbstractFacade implements CategoryFacadeInterface
{
    public function get(int $id): array
    {
        return $this->getFactory()
            ->createCategory()
            ->get($id);
    }

    public function getTrees(): array
    {
        return $this->getFactory()
            ->createCategory()
            ->getTrees();
    }
}
