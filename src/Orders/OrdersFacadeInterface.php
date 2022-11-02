<?php

declare(strict_types=1);

namespace Engineered\Orders;

interface OrdersFacadeInterface
{
    public function getCustomerOrders(string $customerId, string $bearerToken): array;
}
