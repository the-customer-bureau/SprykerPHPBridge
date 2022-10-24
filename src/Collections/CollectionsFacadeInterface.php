<?php

declare(strict_types=1);

namespace Engineered\Collections;

interface CollectionsFacadeInterface
{
    public function getCategoryTrees(): array;

    public function searchAbstractProducts(string $searchTerm): array;
}
