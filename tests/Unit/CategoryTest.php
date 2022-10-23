<?php

namespace Unit;

use Engineered\HttpClient\HttpClientDependencyProvider;
use Engineered\HttpClient\HttpClientFacadeInterface;
use Engineered\Resource\Domain\Category;
use Engineered\SprykerBridge;

use Gacela\Framework\ClassResolver\GlobalInstance\AnonymousGlobal;
use Symfony\Contracts\HttpClient\HttpClientInterface;

use PHPUnit\Framework\TestCase;
use Tests\Fakes\FakeHttpClientDependencyProvider;

class CategoryTest extends TestCase
{
	private $mockHttpClient;
	private $mockHttpClientFacade;
	private $mockHttpResponse;

	protected function setUp(): void
	{
		// set up
		$this->mockHttpClient   = $this->createMock(HttpClientInterface::class);
//		$this->mockHttpResponse = $this->createMock(ResponseInterface::class);

		$this->mockHttpClientFacade = $this->createMock(HttpClientFacadeInterface::class);

//		$this->mockHttpResponse->method('toArray')->willReturn($this->getReturn());

//		$this->mockHttpClient->method('request')->willReturn($this->mockHttpResponse);

		$this->mockHttpClientFacade->method('get')->willReturn($this->getReturn());


		AnonymousGlobal::overrideExistingResolvedClass(
			HttpClientDependencyProvider::class,
			new FakeHttpClientDependencyProvider($this->mockHttpClient)
		);

		SprykerBridge::create('');




	}


	public function testTheCategoryIsReturned(): void
	{


		$category = new Category($this->mockHttpClientFacade);

		$response = $category->get(4);

		$this->assertEquals(4, $response['data']['id']);

		$this->assertIsArray(
			$response
		);

	}


	private function getReturn(): array
	{
		return json_decode('{"data":{"type":"category-nodes","id":"4","attributes":{"nodeId":4,"name":"Camcorders","metaTitle":"Camcorders","metaKeywords":"Camcorders","metaDescription":"Camcorders","isActive":true,"order":90,"url":"\/en\/cameras-&-camcorders\/camcorders","children":[],"parents":[{"nodeId":2,"name":"Cameras & Camcorders","metaTitle":"Cameras & Camcorders","metaKeywords":"Cameras & Camcorders","metaDescription":"Cameras & Camcorders","isActive":true,"order":90,"url":"\/en\/cameras-&-camcorders","children":[],"parents":[{"nodeId":1,"name":"Demoshop","metaTitle":"Demoshop","metaKeywords":"English version of Demoshop","metaDescription":"English version of Demoshop","isActive":true,"order":null,"url":"\/en","children":[],"parents":[]}]}]},"links":{"self":"https:\/\/glue.de.b2c.demo-spryker.com\/category-nodes\/4?include="}}}', true);
	}

}
