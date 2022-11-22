<?php

declare(strict_types=1);

namespace EngineeredTests\Unit;

use Engineered\Category\Domain\Category;
use Engineered\HttpClient\HttpClientFacadeInterface;

use PHPUnit\Framework\TestCase;

class CategoryTreesTest extends TestCase
{
    public function test_the_category_tree_is_returned(): void
    {
        $httpClientFacade = $this->createMock(HttpClientFacadeInterface::class);
        $httpClientFacade->method('get')->willReturn($this->httpClientResponse());
        $category = new Category($httpClientFacade);

        $response = $category->getTrees();

        self::assertEquals(5, $response['data'][0]['attributes']['categoryNodesStorage'][0]['nodeId']);
        $this->assertIsArray($response);
    }

    private function httpClientResponse(): array
    {
        return json_decode(
            '{"data":[{"type":"category-trees","id":null,"attributes":{"categoryNodesStorage":[{"nodeId":5,"order":100,"name":"Computers","url":"/en/computers","children":[{"nodeId":6,"order":100,"name":"Notebooks","url":"/en/computers/notebooks","children":[]},{"nodeId":7,"order":90,"name":"PCs & Workstations","url":"/en/computers/pcs-&-workstations","children":[]},{"nodeId":8,"order":80,"name":"Tablets","url":"/en/computers/tablets","children":[]}]},{"nodeId":2,"order":90,"name":"Cameras & Camcorders","url":"/en/cameras-&-camcorders","children":[{"nodeId":3,"order":100,"name":"Digital Cameras","url":"/en/cameras-&-camcorders/digital-cameras","children":[]},{"nodeId":4,"order":90,"name":"Camcorders","url":"/en/cameras-&-camcorders/camcorders","children":[]}]},{"nodeId":15,"order":80,"name":"Cables","url":"/en/cables","children":[]},{"nodeId":11,"order":80,"name":"Telecom & Navigation","url":"/en/telecom-&-navigation","children":[{"nodeId":12,"order":80,"name":"Smartphones","url":"/en/telecom-&-navigation/smartphones","children":[]}]},{"nodeId":16,"order":80,"name":"Food","url":"/en/food","children":[]},{"nodeId":9,"order":70,"name":"Smart Wearables","url":"/en/smart-wearables","children":[{"nodeId":10,"order":70,"name":"Smartwatches","url":"/en/smart-wearables/smartwatches","children":[]}]}]},"links":{"self":"https://glue.de.b2c.demo-spryker.com/category-trees"}}],"links":{"self":"https://glue.de.b2c.demo-spryker.com/category-trees"}}',
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    }
}
