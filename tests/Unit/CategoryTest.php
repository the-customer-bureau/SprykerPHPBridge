<?php

declare(strict_types=1);

namespace EngineeredTests\Unit;

use Engineered\HttpClient\HttpClientFacadeInterface;
use Engineered\Resource\Domain\Category;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    public function test_the_category_is_returned(): void
    {
        $httpClientFacade = $this->createMock(HttpClientFacadeInterface::class);
        $httpClientFacade->method('get')->willReturn($this->httpClientResponse());
        $category = new Category($httpClientFacade);

        $response = $category->get(4);

        self::assertEquals(4, $response['data']['id']);
        $this->assertIsArray($response);
    }

    private function httpClientResponse(): array
    {
        return json_decode(
            '{"data":{"type":"category-nodes","id":"4","attributes":{"nodeId":4,"name":"Camcorders","metaTitle":"Camcorders","metaKeywords":"Camcorders","metaDescription":"Camcorders","isActive":true,"order":90,"url":"\/en\/cameras-&-camcorders\/camcorders","children":[],"parents":[{"nodeId":2,"name":"Cameras & Camcorders","metaTitle":"Cameras & Camcorders","metaKeywords":"Cameras & Camcorders","metaDescription":"Cameras & Camcorders","isActive":true,"order":90,"url":"\/en\/cameras-&-camcorders","children":[],"parents":[{"nodeId":1,"name":"Demoshop","metaTitle":"Demoshop","metaKeywords":"English version of Demoshop","metaDescription":"English version of Demoshop","isActive":true,"order":null,"url":"\/en","children":[],"parents":[]}]}]},"links":{"self":"https:\/\/glue.de.b2c.demo-spryker.com\/category-nodes\/4?include="}}}',
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    }
}
