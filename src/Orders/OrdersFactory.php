<?php

declare(strict_types=1);

namespace Engineered\Orders;

use Engineered\HttpClient\HttpClientFacadeInterface;
use Engineered\Orders\Domain\Orders;

use Gacela\Framework\AbstractFactory;

/**
 * @method OrdersConfig getConfig()
 */
final class OrdersFactory extends AbstractFactory
{
    public function createOrders(): Orders
    {
        return new Orders($this->getHttpClient());
    }

    private function getHttpClient(): HttpClientFacadeInterface
    {
        return $this->getProvidedDependency(
            OrdersDependencyProvider::FACADE_HTTP_CLIENT
        );
    }
}
