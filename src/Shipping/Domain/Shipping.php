<?php

namespace Engineered\Shipping\Domain;

class Shipping
{


	public function __construct()
	{
	}


	public function create(array $items, array $address, int $shippingMethodId): array
	{

		$payload = [];

		$payload['items']            = $items;
		$payload['shippingAddress']  = $address;
		$payload['idShipmentMethod'] = $shippingMethodId;

		return $payload;

	}

}
