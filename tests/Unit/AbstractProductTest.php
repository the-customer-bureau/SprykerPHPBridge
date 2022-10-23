<?php

declare(strict_types=1);

namespace Unit;

use Engineered\HttpClient\HttpClientDependencyProvider;
use Engineered\HttpClient\HttpClientFacadeInterface;
use Engineered\Resource\Domain\AbstractProduct;
use Engineered\SprykerBridge;

use Gacela\Framework\ClassResolver\GlobalInstance\AnonymousGlobal;
use PHPUnit\Framework\TestCase;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Tests\Fakes\FakeHttpClientDependencyProvider;

class AbstractProductTest extends TestCase
{
    private $mockHttpClientFacade;

    protected function setUp(): void
    {
        // set up

        $this->mockHttpClientFacade = $this->createMock(HttpClientFacadeInterface::class);

        $mockHttpClient   = $this->createMock(HttpClientInterface::class);
        AnonymousGlobal::overrideExistingResolvedClass(
            HttpClientDependencyProvider::class,
            new FakeHttpClientDependencyProvider($mockHttpClient)
        );

        SprykerBridge::create('');
    }

    public function test_the_abstract_product_is_returned(): void
    {
        $this->mockHttpClientFacade->method('get')->willReturn($this->getReturn());
        $concreteProduct = new AbstractProduct($this->mockHttpClientFacade);

        $response = $concreteProduct->get('208');

        $this->assertEquals('208', $response['data']['id']);

        $this->assertIsArray(
            $response
        );
    }

    public function test_the_related_abstract_products_are_returned(): void
    {
        $this->mockHttpClientFacade->method('get')->willReturn($this->getRelatedReturn());
        $concreteProduct = new AbstractProduct($this->mockHttpClientFacade);

        $response = $concreteProduct->getRelated('202');

        $this->assertEquals('016', $response['data'][0]['id']);
        $this->assertEquals('020', $response['data'][4]['id']);
        $this->assertEquals('024', $response['data'][8]['id']);

        $this->assertIsArray(
            $response
        );
    }

    public function test_that_single_attributes_are_returned(): void
    {
        $this->mockHttpClientFacade->method('get')->willReturn($this->getReturn());
        $concreteProduct = new AbstractProduct($this->mockHttpClientFacade);

        $response = $concreteProduct->getReviewCount('208');
        $this->assertEquals(0, $response);

        $response = $concreteProduct->getName('208');
        $this->assertEquals('Toshiba CAMILEO P20', $response);

        $response = $concreteProduct->getDescription('208');
        $this->assertEquals('Experience it The Toshiba Full HD Camileo S40 is eye catching in more ways than one. Its attractive, super-slim design allows you to take it everywhere, so you can capture everything that pleases you. Featuring a choice of colour accents, it also doubles as an elegant 16 megapixel digital still camera. Just pull it out of your pocket, and shoot stunning 1920x1080p Full HD video with up to 5x digital zoom. 10x digital zoom is available for HD and VGA resolution. Electronic Image Stabilisation (EIS) is built in for great results -- and sharing to social networks is a breeze thanks to Camileo Uploader software.', $response);

        $response = $concreteProduct->getMetaTitle('208');
        $this->assertEquals('Toshiba CAMILEO P20', $response);

        $response = $concreteProduct->getMetaKeywords('208');
        $this->assertEquals('Toshiba,Smart Electronics', $response);

        $response = $concreteProduct->getMetaDescription('208');
        $this->assertEquals('Experience it The Toshiba Full HD Camileo S40 is eye catching in more ways than one. Its attractive, super-slim design allows you to take it everywhere, so', $response);
    }

    private function getReturn(): array
    {
        return json_decode('{"data":{"type":"abstract-products","id":"208","attributes":{"sku":"208","averageRating":null,"reviewCount":0,"name":"Toshiba CAMILEO P20","description":"Experience it The Toshiba Full HD Camileo S40 is eye catching in more ways than one. Its attractive, super-slim design allows you to take it everywhere, so you can capture everything that pleases you. Featuring a choice of colour accents, it also doubles as an elegant 16 megapixel digital still camera. Just pull it out of your pocket, and shoot stunning 1920x1080p Full HD video with up to 5x digital zoom. 10x digital zoom is available for HD and VGA resolution. Electronic Image Stabilisation (EIS) is built in for great results -- and sharing to social networks is a breeze thanks to Camileo Uploader software.","attributes":{"digital_zoom":"10 x","total_megapixels":"5 MP","hd_type":"Full HD","weight":"141 g","brand":"Toshiba","color":"white"},"superAttributesDefinition":["total_megapixels","color"],"superAttributes":[],"attributeMap":{"super_attributes":[],"product_concrete_ids":["208_14678762"],"attribute_variants":[],"attribute_variant_map":[]},"metaTitle":"Toshiba CAMILEO P20","metaKeywords":"Toshiba,Smart Electronics","metaDescription":"Experience it The Toshiba Full HD Camileo S40 is eye catching in more ways than one. Its attractive, super-slim design allows you to take it everywhere, so","attributeNames":{"digital_zoom":"Digital zoom","total_megapixels":"Total Megapixels","hd_type":"HD type","weight":"Weight","brand":"Brand","color":"Color"},"url":"\/en\/toshiba-camileo-p20-208"},"links":{"self":"https:\/\/glue.de.b2c.demo-spryker.com\/abstract-products\/208?include="}}}', true);
    }
    private function getRelatedReturn(): array
    {
        return json_decode('{"data":[{"type":"abstract-products","id":"016","attributes":{"sku":"016","averageRating":null,"reviewCount":0,"name":"Sony Cyber-shot DSC-W800","description":"Styled for your pocket Precision photography meets the portability of a smartphone. The W800 is small enough to take great photos, look good while doing it, and slip in your pocket. Shooting great photos and videos is easy with the W800. Buttons are positioned for ease of use, while a dedicated movie button makes shooting movies simple. The vivid 2.7-type Clear Photo LCD display screen lets you view your stills and play back movies with minimal effort. Whip out the W800 to capture crisp, smooth footage in an instant. At the press of a button, you can record blur-free 720 HD images with digital sound. Breathe new life into a picture by using built-in Picture Effect technology. There’s a range of modes to choose from – you don’t even have to download image-editing software.","attributes":{"internal_memory":"29 MB","digital_zoom":"40 x","usb_version":"2","optical_zoom":"5 x","brand":"Sony","color":"black","upcs":"0013803252897"},"superAttributesDefinition":["internal_memory","color"],"superAttributes":[],"attributeMap":{"super_attributes":[],"product_concrete_ids":["016_21748907"],"attribute_variants":[],"attribute_variant_map":[]},"metaTitle":"Sony Cyber-shot DSC-W800","metaKeywords":"Sony,Entertainment Electronics","metaDescription":"Styled for your pocket Precision photography meets the portability of a smartphone. The W800 is small enough to take great photos, look good while doing it","attributeNames":{"internal_memory":"Max internal memory","digital_zoom":"Digital zoom","usb_version":"USB version","optical_zoom":"Optical zoom","brand":"Brand","color":"Color","upcs":"UPCs"},"url":"/en/sony-cyber-shot-dsc-w800-16"},"links":{"self":"https://glue.de.b2c.demo-spryker.com/abstract-products/016"}},{"type":"abstract-products","id":"017","attributes":{"sku":"017","averageRating":null,"reviewCount":0,"name":"Sony Cyber-shot DSC-W800","description":"Styled for your pocket Precision photography meets the portability of a smartphone. The W800 is small enough to take great photos, look good while doing it, and slip in your pocket. Shooting great photos and videos is easy with the W800. Buttons are positioned for ease of use, while a dedicated movie button makes shooting movies simple. The vivid 2.7-type Clear Photo LCD display screen lets you view your stills and play back movies with minimal effort. Whip out the W800 to capture crisp, smooth footage in an instant. At the press of a button, you can record blur-free 720 HD images with digital sound. Breathe new life into a picture by using built-in Picture Effect technology. There’s a range of modes to choose from – you don’t even have to download image-editing software.","attributes":{"internal_memory":"29 MB","digital_zoom":"40 x","usb_version":"2","optical_zoom":"5 x","brand":"Sony","color":"silver","upcs":"0013803252897"},"superAttributesDefinition":["internal_memory","color"],"superAttributes":[],"attributeMap":{"super_attributes":[],"product_concrete_ids":["017_21748906"],"attribute_variants":[],"attribute_variant_map":[]},"metaTitle":"Sony Cyber-shot DSC-W800","metaKeywords":"Sony,Entertainment Electronics","metaDescription":"Styled for your pocket Precision photography meets the portability of a smartphone. The W800 is small enough to take great photos, look good while doing it","attributeNames":{"internal_memory":"Max internal memory","digital_zoom":"Digital zoom","usb_version":"USB version","optical_zoom":"Optical zoom","brand":"Brand","color":"Color","upcs":"UPCs"},"url":"/en/sony-cyber-shot-dsc-w800-17"},"links":{"self":"https://glue.de.b2c.demo-spryker.com/abstract-products/017"}},{"type":"abstract-products","id":"018","attributes":{"sku":"018","averageRating":null,"reviewCount":0,"name":"Sony Cyber-shot DSC-W830","description":"Styled for your pocket  Precision photography meets the portability of a smartphone. The W800 is small enough to take great photos, look good while doing it, and slip in your pocket. Shooting great photos and videos is easy with the W800. Buttons are positioned for ease of use, while a dedicated movie button makes shooting movies simple. The vivid 2.7-type Clear Photo LCD display screen lets you view your stills and play back movies with minimal effort. Whip out the W800 to capture crisp, smooth footage in an instant. At the press of a button, you can record blur-free 720 HD images with digital sound. Breathe new life into a picture by using built-in Picture Effect technology. There’s a range of modes to choose from – you don’t even have to download image-editing software.","attributes":{"hdmi":"no","sensor_type":"CCD","display":"TFT","usb_version":"2","brand":"Sony","color":"pink","upcs":"0013803252897"},"superAttributesDefinition":["color"],"superAttributes":[],"attributeMap":{"super_attributes":[],"product_concrete_ids":["018_21081477"],"attribute_variants":[],"attribute_variant_map":[]},"metaTitle":"Sony Cyber-shot DSC-W830","metaKeywords":"Sony,Entertainment Electronics","metaDescription":"Styled for your pocket  Precision photography meets the portability of a smartphone. The W800 is small enough to take great photos, look good while doing i","attributeNames":{"hdmi":"HDMI","sensor_type":"Sensor type","display":"Display","usb_version":"USB version","brand":"Brand","color":"Color","upcs":"UPCs"},"url":"/en/sony-cyber-shot-dsc-w830-18"},"links":{"self":"https://glue.de.b2c.demo-spryker.com/abstract-products/018"}},{"type":"abstract-products","id":"019","attributes":{"sku":"019","averageRating":null,"reviewCount":0,"name":"Sony Cyber-shot DSC-W830","description":"Styled for your pocket  Precision photography meets the portability of a smartphone. The W800 is small enough to take great photos, look good while doing it, and slip in your pocket. Shooting great photos and videos is easy with the W800. Buttons are positioned for ease of use, while a dedicated movie button makes shooting movies simple. The vivid 2.7-type Clear Photo LCD display screen lets you view your stills and play back movies with minimal effort. Whip out the W800 to capture crisp, smooth footage in an instant. At the press of a button, you can record blur-free 720 HD images with digital sound. Breathe new life into a picture by using built-in Picture Effect technology. There’s a range of modes to choose from – you don’t even have to download image-editing software.","attributes":{"hdmi":"no","sensor_type":"CCD","display":"TFT","usb_version":"2","brand":"Sony","color":"silver","upcs":"0013803252897"},"superAttributesDefinition":["color"],"superAttributes":[],"attributeMap":{"super_attributes":[],"product_concrete_ids":["019_21081473"],"attribute_variants":[],"attribute_variant_map":[]},"metaTitle":"Sony Cyber-shot DSC-W830","metaKeywords":"Sony,Entertainment Electronics","metaDescription":"Styled for your pocket  Precision photography meets the portability of a smartphone. The W800 is small enough to take great photos, look good while doing i","attributeNames":{"hdmi":"HDMI","sensor_type":"Sensor type","display":"Display","usb_version":"USB version","brand":"Brand","color":"Color","upcs":"UPCs"},"url":"/en/sony-cyber-shot-dsc-w830-19"},"links":{"self":"https://glue.de.b2c.demo-spryker.com/abstract-products/019"}},{"type":"abstract-products","id":"020","attributes":{"sku":"020","averageRating":null,"reviewCount":0,"name":"Sony Cyber-shot DSC-W830","description":"Styled for your pocket  Precision photography meets the portability of a smartphone. The W800 is small enough to take great photos, look good while doing it, and slip in your pocket. Shooting great photos and videos is easy with the W800. Buttons are positioned for ease of use, while a dedicated movie button makes shooting movies simple. The vivid 2.7-type Clear Photo LCD display screen lets you view your stills and play back movies with minimal effort. Whip out the W800 to capture crisp, smooth footage in an instant. At the press of a button, you can record blur-free 720 HD images with digital sound. Breathe new life into a picture by using built-in Picture Effect technology. There’s a range of modes to choose from – you don’t even have to download image-editing software.","attributes":{"hdmi":"no","sensor_type":"CCD","display":"TFT","usb_version":"2","brand":"Sony","color":"black","upcs":"0013803252897"},"superAttributesDefinition":["color"],"superAttributes":[],"attributeMap":{"super_attributes":[],"product_concrete_ids":["020_21081478"],"attribute_variants":[],"attribute_variant_map":[]},"metaTitle":"Sony Cyber-shot DSC-W830","metaKeywords":"Sony,Entertainment Electronics","metaDescription":"Styled for your pocket  Precision photography meets the portability of a smartphone. The W800 is small enough to take great photos, look good while doing i","attributeNames":{"hdmi":"HDMI","sensor_type":"Sensor type","display":"Display","usb_version":"USB version","brand":"Brand","color":"Color","upcs":"UPCs"},"url":"/en/sony-cyber-shot-dsc-w830-20"},"links":{"self":"https://glue.de.b2c.demo-spryker.com/abstract-products/020"}},{"type":"abstract-products","id":"021","attributes":{"sku":"021","averageRating":null,"reviewCount":0,"name":"Sony Cyber-shot DSC-W830","description":"Styled for your pocket  Precision photography meets the portability of a smartphone. The W800 is small enough to take great photos, look good while doing it, and slip in your pocket. Shooting great photos and videos is easy with the W800. Buttons are positioned for ease of use, while a dedicated movie button makes shooting movies simple. The vivid 2.7-type Clear Photo LCD display screen lets you view your stills and play back movies with minimal effort. Whip out the W800 to capture crisp, smooth footage in an instant. At the press of a button, you can record blur-free 720 HD images with digital sound. Breathe new life into a picture by using built-in Picture Effect technology. There’s a range of modes to choose from – you don’t even have to download image-editing software.","attributes":{"hdmi":"no","sensor_type":"CCD","display":"TFT","usb_version":"2","brand":"Sony","color":"purple","upcs":"0013803252897"},"superAttributesDefinition":["color"],"superAttributes":[],"attributeMap":{"super_attributes":[],"product_concrete_ids":["021_21081475"],"attribute_variants":[],"attribute_variant_map":[]},"metaTitle":"Sony Cyber-shot DSC-W830","metaKeywords":"Sony,Entertainment Electronics","metaDescription":"Styled for your pocket  Precision photography meets the portability of a smartphone. The W800 is small enough to take great photos, look good while doing i","attributeNames":{"hdmi":"HDMI","sensor_type":"Sensor type","display":"Display","usb_version":"USB version","brand":"Brand","color":"Color","upcs":"UPCs"},"url":"/en/sony-cyber-shot-dsc-w830-21"},"links":{"self":"https://glue.de.b2c.demo-spryker.com/abstract-products/021"}},{"type":"abstract-products","id":"022","attributes":{"sku":"022","averageRating":null,"reviewCount":0,"name":"Sony Cyber-shot DSC-WX220","description":"Styled for your pocket  Precision photography meets the portability of a smartphone. The W800 is small enough to take great photos, look good while doing it, and slip in your pocket. Shooting great photos and videos is easy with the W800. Buttons are positioned for ease of use, while a dedicated movie button makes shooting movies simple. The vivid 2.7-type Clear Photo LCD display screen lets you view your stills and play back movies with minimal effort. Whip out the W800 to capture crisp, smooth footage in an instant. At the press of a button, you can record blur-free 720 HD images with digital sound. Breathe new life into a picture by using built-in Picture Effect technology. There’s a range of modes to choose from – you don’t even have to download image-editing software.","attributes":{"megapixel":"18.2 MP","display":"LCD","digital_zoom":"20 x","sensor_type":"CMOS","brand":"Sony","color":"gold"},"superAttributesDefinition":["color"],"superAttributes":[],"attributeMap":{"super_attributes":[],"product_concrete_ids":["022_21994751"],"attribute_variants":[],"attribute_variant_map":[]},"metaTitle":"Sony Cyber-shot DSC-WX220","metaKeywords":"Sony,Entertainment Electronics","metaDescription":"Styled for your pocket  Precision photography meets the portability of a smartphone. The W800 is small enough to take great photos, look good while doing i","attributeNames":{"megapixel":"Megapixel","display":"Display","digital_zoom":"Digital zoom","sensor_type":"Sensor type","brand":"Brand","color":"Color"},"url":"/en/sony-cyber-shot-dsc-wx220-22"},"links":{"self":"https://glue.de.b2c.demo-spryker.com/abstract-products/022"}},{"type":"abstract-products","id":"023","attributes":{"sku":"023","averageRating":null,"reviewCount":0,"name":"Sony Cyber-shot DSC-WX220","description":"Styled for your pocket  Precision photography meets the portability of a smartphone. The W800 is small enough to take great photos, look good while doing it, and slip in your pocket. Shooting great photos and videos is easy with the W800. Buttons are positioned for ease of use, while a dedicated movie button makes shooting movies simple. The vivid 2.7-type Clear Photo LCD display screen lets you view your stills and play back movies with minimal effort. Whip out the W800 to capture crisp, smooth footage in an instant. At the press of a button, you can record blur-free 720 HD images with digital sound. Breathe new life into a picture by using built-in Picture Effect technology. There’s a range of modes to choose from – you don’t even have to download image-editing software.","attributes":{"megapixel":"18.2 MP","display":"LCD","digital_zoom":"20 x","sensor_type":"CMOS","brand":"Sony","color":"black"},"superAttributesDefinition":["color"],"superAttributes":[],"attributeMap":{"super_attributes":[],"product_concrete_ids":["023_21758366"],"attribute_variants":[],"attribute_variant_map":[]},"metaTitle":"Sony Cyber-shot DSC-WX220","metaKeywords":"Sony,Entertainment Electronics","metaDescription":"Styled for your pocket  Precision photography meets the portability of a smartphone. The W800 is small enough to take great photos, look good while doing i","attributeNames":{"megapixel":"Megapixel","display":"Display","digital_zoom":"Digital zoom","sensor_type":"Sensor type","brand":"Brand","color":"Color"},"url":"/en/sony-cyber-shot-dsc-wx220-23"},"links":{"self":"https://glue.de.b2c.demo-spryker.com/abstract-products/023"}},{"type":"abstract-products","id":"024","attributes":{"sku":"024","averageRating":null,"reviewCount":0,"name":"Sony Cyber-shot DSC-WX350","description":"Styled for your pocket  Precision photography meets the portability of a smartphone. The W800 is small enough to take great photos, look good while doing it, and slip in your pocket. Shooting great photos and videos is easy with the W800. Buttons are positioned for ease of use, while a dedicated movie button makes shooting movies simple. The vivid 2.7-type Clear Photo LCD display screen lets you view your stills and play back movies with minimal effort. Whip out the W800 to capture crisp, smooth footage in an instant. At the press of a button, you can record blur-free 720 HD images with digital sound. Breathe new life into a picture by using built-in Picture Effect technology. There’s a range of modes to choose from – you don’t even have to download image-editing software.","attributes":{"megapixel":"18.2 MP","digital_zoom":"40 x","usb_version":"2","voice_recording":"yes","brand":"Sony","color":"pink"},"superAttributesDefinition":["color"],"superAttributes":[],"attributeMap":{"super_attributes":[],"product_concrete_ids":["024_21987578"],"attribute_variants":[],"attribute_variant_map":[]},"metaTitle":"Sony Cyber-shot DSC-WX350","metaKeywords":"Sony,Entertainment Electronics","metaDescription":"Styled for your pocket  Precision photography meets the portability of a smartphone. The W800 is small enough to take great photos, look good while doing i","attributeNames":{"megapixel":"Megapixel","digital_zoom":"Digital zoom","usb_version":"USB version","voice_recording":"Voice recording","brand":"Brand","color":"Color"},"url":"/en/sony-cyber-shot-dsc-wx350-24"},"links":{"self":"https://glue.de.b2c.demo-spryker.com/abstract-products/024"}},{"type":"abstract-products","id":"025","attributes":{"sku":"025","averageRating":null,"reviewCount":0,"name":"Sony Cyber-shot DSC-WX350","description":"Styled for your pocket  Precision photography meets the portability of a smartphone. The W800 is small enough to take great photos, look good while doing it, and slip in your pocket. Shooting great photos and videos is easy with the W800. Buttons are positioned for ease of use, while a dedicated movie button makes shooting movies simple. The vivid 2.7-type Clear Photo LCD display screen lets you view your stills and play back movies with minimal effort. Whip out the W800 to capture crisp, smooth footage in an instant. At the press of a button, you can record blur-free 720 HD images with digital sound. Breathe new life into a picture by using built-in Picture Effect technology. There’s a range of modes to choose from – you don’t even have to download image-editing software.","attributes":{"megapixel":"18.2 MP","digital_zoom":"40 x","usb_version":"2","voice_recording":"yes","brand":"Sony","color":"black"},"superAttributesDefinition":["color"],"superAttributes":[],"attributeMap":{"super_attributes":[],"product_concrete_ids":["025_21764665"],"attribute_variants":[],"attribute_variant_map":[]},"metaTitle":"Sony Cyber-shot DSC-WX350","metaKeywords":"Sony,Entertainment Electronics","metaDescription":"Styled for your pocket  Precision photography meets the portability of a smartphone. The W800 is small enough to take great photos, look good while doing i","attributeNames":{"megapixel":"Megapixel","digital_zoom":"Digital zoom","usb_version":"USB version","voice_recording":"Voice recording","brand":"Brand","color":"Color"},"url":"/en/sony-cyber-shot-dsc-wx350-25"},"links":{"self":"https://glue.de.b2c.demo-spryker.com/abstract-products/025"}},{"type":"abstract-products","id":"026","attributes":{"sku":"026","averageRating":null,"reviewCount":0,"name":"Sony Cyber-shot DSC-WX350","description":"Styled for your pocket  Precision photography meets the portability of a smartphone. The W800 is small enough to take great photos, look good while doing it, and slip in your pocket. Shooting great photos and videos is easy with the W800. Buttons are positioned for ease of use, while a dedicated movie button makes shooting movies simple. The vivid 2.7-type Clear Photo LCD display screen lets you view your stills and play back movies with minimal effort. Whip out the W800 to capture crisp, smooth footage in an instant. At the press of a button, you can record blur-free 720 HD images with digital sound. Breathe new life into a picture by using built-in Picture Effect technology. There’s a range of modes to choose from – you don’t even have to download image-editing software.","attributes":{"megapixel":"18.2 MP","digital_zoom":"40 x","usb_version":"2","voice_recording":"yes","brand":"Sony","color":"white"},"superAttributesDefinition":["color"],"superAttributes":[],"attributeMap":{"super_attributes":[],"product_concrete_ids":["026_21748904"],"attribute_variants":[],"attribute_variant_map":[]},"metaTitle":"Sony Cyber-shot DSC-WX350","metaKeywords":"Sony,Entertainment Electronics","metaDescription":"Styled for your pocket  Precision photography meets the portability of a smartphone. The W800 is small enough to take great photos, look good while doing i","attributeNames":{"megapixel":"Megapixel","digital_zoom":"Digital zoom","usb_version":"USB version","voice_recording":"Voice recording","brand":"Brand","color":"Color"},"url":"/en/sony-cyber-shot-dsc-wx350-26"},"links":{"self":"https://glue.de.b2c.demo-spryker.com/abstract-products/026"}},{"type":"abstract-products","id":"027","attributes":{"sku":"027","averageRating":null,"reviewCount":0,"name":"Sony Cyber-shot DSC-WX500","description":"Styled for your pocket  Precision photography meets the portability of a smartphone. The W800 is small enough to take great photos, look good while doing it, and slip in your pocket. Shooting great photos and videos is easy with the W800. Buttons are positioned for ease of use, while a dedicated movie button makes shooting movies simple. The vivid 2.7-type Clear Photo LCD display screen lets you view your stills and play back movies with minimal effort. Whip out the W800 to capture crisp, smooth footage in an instant. At the press of a button, you can record blur-free 720 HD images with digital sound. Breathe new life into a picture by using built-in Picture Effect technology. There’s a range of modes to choose from – you don’t even have to download image-editing software.","attributes":{"camera_type":"Compact camera","display":"LCD","hdmi":"yes","digital_zoom":"120 x","brand":"Sony","color":"red"},"superAttributesDefinition":["color"],"superAttributes":[],"attributeMap":{"super_attributes":[],"product_concrete_ids":["027_26976107"],"attribute_variants":[],"attribute_variant_map":[]},"metaTitle":"Sony Cyber-shot DSC-WX500","metaKeywords":"Sony,Entertainment Electronics","metaDescription":"Styled for your pocket  Precision photography meets the portability of a smartphone. The W800 is small enough to take great photos, look good while doing i","attributeNames":{"camera_type":"Camera type","display":"Display","hdmi":"HDMI","digital_zoom":"Digital zoom","brand":"Brand","color":"Color"},"url":"/en/sony-cyber-shot-dsc-wx500-27"},"links":{"self":"https://glue.de.b2c.demo-spryker.com/abstract-products/027"}}],"links":{"self":"https://glue.de.b2c.demo-spryker.com/abstract-products/202/related-products"}}', true);
    }
}
