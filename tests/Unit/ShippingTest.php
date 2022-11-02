<?php

declare(strict_types=1);

namespace EngineeredTests\Unit;

use Engineered\Shipping\Domain\Shipping;
use PHPUnit\Framework\TestCase;

class ShippingTest extends TestCase
{
    public function test_the_shipping_data_returned(): void
    {

        $shipping = new Shipping();

		$address = [];

		$address['id'] = null;
		$address['salutation'] = 'Mr';
		$address['firstName'] = 'Spencor';
		$address['lastName'] = 'Hopkin';
		$address['address1'] = 'Urbanstraße';
		$address['address2'] = '119';
		$address['address3'] = 'Spencor\'s address';
		$address['zipCode'] = '10967';
		$address['city'] = 'Berlin';
		$address['iso2Code'] = 'DE';
		$address['company'] = 'spryker';
		$address['phone'] = '+49 (30) 2084 98350';

        $response = $shipping->create(['1041'], $address, 1);

        self::assertEquals('Urbanstraße', $response['shippingAddress']['address1']);
        self::assertEquals('10967', $response['shippingAddress']['zipCode']);
        self::assertEquals('1041', $response['items'][0]);
        $this->assertIsArray($response);
    }

}
