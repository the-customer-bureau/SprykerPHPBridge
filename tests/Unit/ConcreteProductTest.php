<?php

declare(strict_types=1);

namespace EngineeredTests\Unit;

use Engineered\HttpClient\HttpClientFacadeInterface;
use Engineered\Resource\Domain\ConcreteProduct;
use PHPUnit\Framework\TestCase;

class ConcreteProductTest extends TestCase
{
    public function test_the_concrete_product_is_returned(): void
    {
        $httpClientFacade = $this->createMock(HttpClientFacadeInterface::class);
        $httpClientFacade->method('get')->willReturn($this->httpClientResponse());
        $concreteProduct = new ConcreteProduct($httpClientFacade);

        $response = $concreteProduct->get('209_12554247');

        self::assertEquals('209_12554247', $response['data']['id']);
        $this->assertIsArray($response);
    }

    private function httpClientResponse(): array
    {
        return json_decode(
            '{"data":{"type":"concrete-products","id":"209_12554247","attributes":{"sku":"209_12554247","isDiscontinued":false,"discontinuedNote":null,"averageRating":null,"reviewCount":0,"productAbstractSku":"209","name":"Toshiba CAMILEO S20","description":"Capture. Edit. Share. Previewing, watching and sharing your videos dont get any easier. The S30 is equipped with a large 3 swiveling LCD with touch for convenient access to menus. Share your memories with your family and friends by uploading to YouTube, Facebook, TwitVid, and Picasa with the one-touch Internet upload button, or watch them directly on your TV with the included HDMI\u00ae cable. The CAMILEO S30 sports 1920x1080p Full HD Video, 16x digital zoom, and video stabilization. The S30 also doubles as an 8 Megapixel digital still camera. The S30 has multiple recording modes: macro for close-up shots, motion detection for surveillance, slow motion for sports, time lapse for condensing extended footage, and pre-record so you wont miss those special moments.","attributes":{"focus_adjustment":"Auto","weight":"118 g","total_megapixels":"8 MP","memory_slots":"1","brand":"Toshiba","color":"grey"},"superAttributesDefinition":["total_megapixels","color"],"metaTitle":"Toshiba CAMILEO S20","metaKeywords":"Toshiba,Smart Electronics","metaDescription":"Capture. Edit. Share. Previewing, watching and sharing your videos dont get any easier. The S30 is equipped with a large 3 swiveling LCD with touch for c","attributeNames":{"focus_adjustment":"Focus adjustment","weight":"Weight","total_megapixels":"Total Megapixels","memory_slots":"Memory slots","brand":"Brand","color":"Color"}},"links":{"self":"https:\/\/glue.de.b2c.demo-spryker.com\/concrete-products\/209_12554247?include="}}}',
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    }
}
