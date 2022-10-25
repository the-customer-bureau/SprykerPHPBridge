<?php

declare(strict_types=1);

namespace Engineered\Customer;

/**
 * @method CustomerFactory getFactory()
 */
interface CustomerFacadeInterface
{
    public function get(string $bearerToken): array;
}
