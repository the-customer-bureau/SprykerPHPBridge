<?php

declare(strict_types=1);

namespace Engineered\Customer;

use Gacela\Framework\AbstractFacade;

/**
 * @method CustomerFactory getFactory()
 */
final class CustomerFacade extends AbstractFacade implements CustomerFacadeInterface
{
    public function get(string $bearerToken): array
    {
        return $this->getFactory()
            ->createCustomer()
            ->get($bearerToken);
    }
}
