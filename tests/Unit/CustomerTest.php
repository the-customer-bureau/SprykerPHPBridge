<?php

declare(strict_types=1);

namespace EngineeredTests\Unit;

use Engineered\Customer\Domain\Customer;
use Engineered\HttpClient\HttpClientFacadeInterface;

use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase
{
    public function test_the_customer_is_returned(): void
    {
        $httpClientFacade = $this->createMock(HttpClientFacadeInterface::class);
        $httpClientFacade->method('getProtected')->willReturn($this->httpClientResponse());
        $customer = new Customer($httpClientFacade);

        $response = $customer->get('bearerToken');

        self::assertEquals('DE--21', $response['data'][0]['id']);
        self::assertEquals('Sonia', $response['data'][0]['attributes']['firstName']);
        $this->assertIsArray($response);
    }

    public function test_the_customer_id_is_returned(): void
    {
        $httpClientFacade = $this->createMock(HttpClientFacadeInterface::class);
        $httpClientFacade->method('getProtected')->willReturn($this->httpClientResponse());
        $customer = new Customer($httpClientFacade);

        $response = $customer->getId('bearerToken');

        self::assertEquals('DE--21', $response);
        $this->assertIsString($response);
    }

    public function test_the_customer_attributes_are_returned(): void
    {
        $httpClientFacade = $this->createMock(HttpClientFacadeInterface::class);
        $httpClientFacade->method('getProtected')->willReturn($this->httpClientResponse());
        $customer = new Customer($httpClientFacade);

        $response = $customer->getAttributes('bearerToken');

        self::assertEquals(json_decode('{"firstName":"Sonia","lastName":"Wagner","email":"sonia@spryker.com","gender":"Female","dateOfBirth":null,"salutation":"Ms","createdAt":"2022-10-25 00:14:28.000000","updatedAt":"2022-10-25 00:14:28.000000"}', true), $response);
        $this->assertIsArray($response);
    }

    private function httpClientResponse(): array
    {
        return json_decode(
            '{"data":[{"type":"customers","id":"DE--21","attributes":{"firstName":"Sonia","lastName":"Wagner","email":"sonia@spryker.com","gender":"Female","dateOfBirth":null,"salutation":"Ms","createdAt":"2022-10-25 00:14:28.000000","updatedAt":"2022-10-25 00:14:28.000000"},"links":{"self":"https://glue.de.b2c.demo-spryker.com/customers/DE--21"}}],"links":{"self":"https://glue.de.b2c.demo-spryker.com/customers"}}',
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    }
}
