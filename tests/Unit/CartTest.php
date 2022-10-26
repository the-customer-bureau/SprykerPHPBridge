<?php

declare(strict_types=1);

namespace EngineeredTests\Unit;

use Engineered\Cart\Domain\GuestCartItems;
use Engineered\HttpClient\HttpClientFacadeInterface;

use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    public function test_the_guest_cart_is_returned(): void
    {
        $httpClientFacade = $this->createMock(HttpClientFacadeInterface::class);
        $httpClientFacade->method('post')->willReturn($this->httpClientResponse());
        $guestCart = new GuestCartItems($httpClientFacade);

        $response = $guestCart->add('209_12554247', 8, '123');

        self::assertEquals('892ca414-31b9-54bd-8837-9964722d0ea8', $response['data']['id']);
        self::assertEquals(35222, $response['data']['attributes']['totals']['grandTotal']);
        $this->assertIsArray($response);
    }

    private function httpClientResponse(): array
    {
        return json_decode(
            '{"data":{"type":"guest-carts","id":"892ca414-31b9-54bd-8837-9964722d0ea8","attributes":{"priceMode":"GROSS_MODE","currency":"EUR","store":"DE","totals":{"expenseTotal":0,"discountTotal":3914,"taxTotal":2304,"subtotal":39136,"grandTotal":35222,"priceToPay":35222},"discounts":[{"displayName":"10% off minimum order","amount":3914,"code":null}],"thresholds":[]},"links":{"self":"https:\/\/glue.de.b2c.demo-spryker.com\/guest-carts\/892ca414-31b9-54bd-8837-9964722d0ea8"},"relationships":{"guest-cart-items":{"data":[{"type":"guest-cart-items","id":"209_12554247"}]}}},"included":[{"type":"guest-cart-items","id":"209_12554247","attributes":{"sku":"209_12554247","quantity":2,"groupKey":"209_12554247","abstractSku":"209","amount":null,"calculations":{"unitPrice":19568,"sumPrice":39136,"taxRate":7,"unitNetPrice":0,"sumNetPrice":0,"unitGrossPrice":19568,"sumGrossPrice":39136,"unitTaxAmountFullAggregation":1152,"sumTaxAmountFullAggregation":2304,"sumSubtotalAggregation":39136,"unitSubtotalAggregation":19568,"unitProductOptionPriceAggregation":0,"sumProductOptionPriceAggregation":0,"unitDiscountAmountAggregation":1957,"sumDiscountAmountAggregation":3914,"unitDiscountAmountFullAggregation":1957,"sumDiscountAmountFullAggregation":3914,"unitPriceToPayAggregation":17611,"sumPriceToPayAggregation":35222},"configuredBundle":null,"configuredBundleItem":null,"selectedProductOptions":[]},"links":{"self":"https:\/\/glue.de.b2c.demo-spryker.com\/guest-carts\/892ca414-31b9-54bd-8837-9964722d0ea8\/guest-cart-items\/209_12554247"}}]}',
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    }
}
