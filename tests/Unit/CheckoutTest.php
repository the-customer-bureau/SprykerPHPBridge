<?php

declare(strict_types=1);

namespace EngineeredTests\Unit;

use Engineered\Checkout\Domain\Checkout;
use Engineered\HttpClient\HttpClientFacadeInterface;

use PHPUnit\Framework\TestCase;

class CheckoutTest extends TestCase
{
    public function test_the_post_data_can_be_created(): void
    {
        $httpClientFacade = $this->createMock(HttpClientFacadeInterface::class);
        //        $httpClientFacade->method('getProtected')->willReturn($this->httpClientResponse());
        $checkout = new Checkout($httpClientFacade);

        $postData = $checkout->buildCheckoutPostData('123-456-789', $this->getCustomerData(), $this->getBillingAddressData(), $this->getPaymentsData(), $this->getShipmentsData());

        self::assertEquals($this->getPostData(), $postData);
        self::assertEquals('123-456-789', $postData['data']['attributes']['idCart']);
        self::assertEquals('Spencor', $postData['data']['attributes']['customer']['firstName']);
        self::assertEquals('10115', $postData['data']['attributes']['billingAddress']['zipCode']);
        $this->assertIsArray($postData);
    }

    public function test_the_checkout_runs(): void
    {
        $httpClientFacade = $this->createMock(HttpClientFacadeInterface::class);
        $httpClientFacade->method('post')->willReturn($this->httpClientResponse());
        $checkout = new Checkout($httpClientFacade);

        $postData = $checkout->buildCheckoutPostData('123-456-789', $this->getCustomerData(), $this->getBillingAddressData(), $this->getPaymentsData(), $this->getShipmentsData());

        $response = $checkout->guestCheckout('123456', $postData);

        self::assertEquals('DE--2', $response['data']['attributes']['orderReference']);
        $this->assertIsArray($response);
    }

    private function httpClientResponse(): array
    {
        return json_decode(
            '{"data":{"type":"checkout","id":null,"attributes":{"orderReference":"DE--2","redirectUrl":null,"isExternalRedirect":null},"links":{"self":"https:\/\/glue.de.b2c.demo-spryker.com\/checkout"}}}',
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    }

    private function getPostData(): array
    {
        return json_decode(
            '{"data":{"type":"checkout","attributes":{"customer":{"salutation":"Mr","email":"spencor.hopkin@spryker.com","firstName":"Spencor","lastName":"Hopkin"},"idCart":"123-456-789","billingAddress":{"salutation":"Mr","firstName":"Spencor","lastName":"Hopkin","address1":"Julie-Wolfthorn-Stra\u00dfe","address2":"1","address3":"new address","zipCode":"10115","city":"Berlin","iso2Code":"DE","company":"spryker","phone":"+49 (30) 2084 98350"},"payments":[{"paymentMethodName":"Credit Card","paymentProviderName":"DummyPayment"}],"shipments":[{"items":["038_25905593"],"shippingAddress":{"id":null,"salutation":"Mr","firstName":"Spencor","lastName":"Hopkin","address1":"Urbanstra\u00dfe","address2":"119","address3":"Spencor\'s address","zipCode":"10967","city":"Berlin","iso2Code":"DE","company":"spryker","phone":"+49 (30) 2084 98350"},"idShipmentMethod":1,"requestedDeliveryDate":"2022-09-29"}]}}}',
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    }

    private function getCustomerData(): array
    {
        return [
            'salutation' => 'Mr',
            'email'      => 'spencor.hopkin@spryker.com',
            'firstName'  => 'Spencor',
            'lastName'   => 'Hopkin',
        ];
    }

    private function getBillingAddressData(): array
    {
        return [
            'salutation' => 'Mr',
            'firstName'  => 'Spencor',
            'lastName'   => 'Hopkin',
            'address1'   => 'Julie-Wolfthorn-Straße',
            'address2'   => '1',
            'address3'   => 'new address',
            'zipCode'    => '10115',
            'city'       => 'Berlin',
            'iso2Code'   => 'DE',
            'company'    => 'spryker',
            'phone'      => '+49 (30) 2084 98350',
        ];
    }

    private function getPaymentsData(): array
    {
        return [
            [
                'paymentMethodName'   => 'Credit Card',
                'paymentProviderName' => 'DummyPayment',
            ],
        ];
    }

    private function getShipmentsData(): array
    {
        return [
            [
                'items'                 => [
                    '038_25905593',
                ],
                'shippingAddress'       => [
                    'id'         => null,
                    'salutation' => 'Mr',
                    'firstName'  => 'Spencor',
                    'lastName'   => 'Hopkin',
                    'address1'   => 'Urbanstraße',
                    'address2'   => '119',
                    'address3'   => 'Spencor\'s address',
                    'zipCode'    => '10967',
                    'city'       => 'Berlin',
                    'iso2Code'   => 'DE',
                    'company'    => 'spryker',
                    'phone'      => '+49 (30) 2084 98350',
                ],
                'idShipmentMethod'      => 1,
                'requestedDeliveryDate' => '2022-09-29',
            ],
        ];
    }
}
