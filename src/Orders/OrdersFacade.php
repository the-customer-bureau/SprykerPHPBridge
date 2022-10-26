<?php

declare(strict_types=1);

namespace Engineered\Orders;

use Gacela\Framework\AbstractFacade;

/**
 * @method OrdersFactory getFactory()
 */
final class OrdersFacade extends AbstractFacade implements OrdersFacadeInterface
{
    public function getCustomerOrders(string $customerId, string $bearerToken): array
    {
        return $this->getFactory()->createOrders()->get($customerId, $bearerToken);
    }
}
