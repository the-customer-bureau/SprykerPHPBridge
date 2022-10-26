<?php

declare(strict_types=1);

namespace EngineeredTests\Unit;

use Engineered\HttpClient\HttpClientFacadeInterface;
use Engineered\Orders\Domain\Orders;

use PHPUnit\Framework\TestCase;

class OrdersTest extends TestCase
{
    public function test_the_customers_orders_are_returned(): void
    {
        $httpClientFacade = $this->createMock(HttpClientFacadeInterface::class);
        $httpClientFacade->method('getProtected')->willReturn($this->httpClientResponse());
        $orders = new Orders($httpClientFacade);

        $response = $orders->get('id', '123');

        self::assertEquals('DE--1', $response['data'][0]['id']);
        self::assertEquals(6990, $response['data'][0]['attributes']['totals']['grandTotal']);
        $this->assertIsArray($response);
    }

    private function httpClientResponse(): array
    {
        return json_decode(
            '{"data":[{"type":"orders","id":"DE--1","attributes":{"merchantReferences":[],"itemStates":["exported"],"createdAt":"2021-04-28 14:29:50.871313","currencyIsoCode":"EUR","priceMode":"GROSS_MODE","totals":{"expenseTotal":490,"discountTotal":0,"taxTotal":1116,"subtotal":6500,"grandTotal":6990,"canceledTotal":0,"remunerationTotal":0}},"links":{"self":"https://glue.mysprykershop.com/orders/DE--1?offset=20"}}],"links":{"self":"https://glue.mysprykershop.com/customers/DE--1/orders?offset=20"}}',
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    }
}
