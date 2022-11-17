<?php

declare(strict_types=1);

namespace Engineered\Checkout;

use Engineered\Checkout\Domain\Checkout;
use Engineered\HttpClient\HttpClientFacadeInterface;
use Gacela\Framework\AbstractFactory;

/**
 * @method CheckoutConfig getConfig()
 */
final class CheckoutFactory extends AbstractFactory
{
    public function createCheckout(): Checkout
    {
        return new Checkout($this->getHttpClient());
    }

    private function getHttpClient(): HttpClientFacadeInterface
    {
        return $this->getProvidedDependency(
            CheckoutDependencyProvider::FACADE_HTTP_CLIENT
        );
    }
}
