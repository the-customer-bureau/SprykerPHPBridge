<?php

declare(strict_types=1);

namespace Engineered\Category;

interface CategoryFacadeInterface
{
    public function get(int $id): array;

    public function getTree(): array;
}
