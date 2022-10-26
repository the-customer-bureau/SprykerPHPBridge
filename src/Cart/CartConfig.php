<?php

declare(strict_types=1);

namespace Engineered\Cart;

use Gacela\Framework\AbstractConfig;

final class CartConfig extends AbstractConfig
{
    public function getCurrency(): string
    {
        return (string) $this->get('GLUE_CURRENCY');
    }

    public function getStore(): string
    {
        return (string) $this->get('GLUE_STORE');
    }
}
