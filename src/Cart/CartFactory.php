<?php

declare(strict_types=1);

namespace Engineered\Cart;

use Engineered\Cart\Domain\CustomerCarts;
use Engineered\Cart\Domain\GuestCartItems;

use Engineered\HttpClient\HttpClientFacadeInterface;
use Gacela\Framework\AbstractFactory;

/**
 * @method CartConfig getConfig()
 */
final class CartFactory extends AbstractFactory
{
    public function createGuestCartItems(): GuestCartItems
    {
        return new GuestCartItems(
            $this->getHttpClient()
        );
    }

    public function createCustomerCarts(): CustomerCarts
    {
        return new CustomerCarts(
            $this->getHttpClient(),
            $this->getConfig()->getCurrency(),
            $this->getConfig()->getStore()
        );
    }

    private function getHttpClient(): HttpClientFacadeInterface
    {
        return $this->getProvidedDependency(
            CartDependencyProvider::FACADE_HTTP_CLIENT
        );
    }
}
