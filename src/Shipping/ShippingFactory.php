<?php

declare(strict_types=1);

namespace Engineered\Shipping;

use Engineered\Shipping\Domain\Shipping;
use Gacela\Framework\AbstractFactory;

/**
 * @method ShippingConfig getConfig()
 */
final class ShippingFactory extends AbstractFactory
{
    public function createShipping(): Shipping
    {
        return new Shipping();
    }
}
