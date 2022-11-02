<?php

declare(strict_types=1);

namespace Engineered\Shipping;

use Gacela\Framework\AbstractFacade;

/**
 * @method ShippingFactory getFactory()
 */
final class ShippingFacade extends AbstractFacade
{

	public function create(array $items, array $address, int $shippingMethodId): array
	{
		return $this->getFactory()->createShipping()->create($items, $address, $shippingMethodId);
	}

}
