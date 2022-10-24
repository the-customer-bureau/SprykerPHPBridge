<?php

declare(strict_types=1);

namespace EngineeredTests\Unit;

use Engineered\Auth\Domain\AccessToken;
use Engineered\HttpClient\HttpClientFacadeInterface;

use PHPUnit\Framework\TestCase;

class AuthTest extends TestCase
{
    public function test_the_access_token_is_returned(): void
    {
        $httpClientFacade = $this->createMock(HttpClientFacadeInterface::class);
        $httpClientFacade->method('post')->willReturn($this->httpClientResponse());
        $auth = new AccessToken($httpClientFacade);

        $response = $auth->get('sonia@spryker.com', 'change123');

        self::assertEquals('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiJmcm9udGVuZCIsImp0aSI6IjZlYzY2YmY4N2U5MWQ5MTJkMDMyMjlkZWVjZmIyNWU0YjZiMDYxMWYxYzlkOGY3MjU1NzkxODJiMDJlOTRkYjM4NTMyZTI4MTA2ZTY3YWE3IiwiaWF0IjoxNjY2NjUwNDA0LCJuYmYiOjE2NjY2NTA0MDQsImV4cCI6MTY2NjY3OTIwNCwic3ViIjoie1wiaWRfYWdlbnRcIjpudWxsLFwiY3VzdG9tZXJfcmVmZXJlbmNlXCI6XCJERS0tMjFcIixcImlkX2N1c3RvbWVyXCI6MjF9Iiwic2NvcGVzIjpbImN1c3RvbWVyIl19.feQYy9aCjQM5vBMf-j6s6V6Qkk0_AIzIlyW8SO6DDOoHLyhv0kUpOv8Y0F-JO5VqM_MbTaiKGIw9pDXKiZUo2AE9OtOX6F8YTrlIMh9KKoAQ4JQcszz5_zbttj5qtnfiHovBdQdTlx0Uk6uCEZhvX6b51xWcV-KJiuSlLu4GBLgCl1B0WBVKjxLgDhZJdvNz7txtckwDq94rjLBKLx0C3JrpVjt1EMWXvw3tA1NB3NV3WPWU3aBo_lJ2mdLSxbdl1QyJQOg_Gw6oyK4WMcrPsQenGD5XsC2YdVj--XABmiv1mxk7_kzXoPQd9ZA8pTIqdGGsfjPzK_Tr7Ue0Q70BgQ', $response['data']['attributes']['accessToken']);
        $this->assertIsArray($response);
    }

    public function test_the_response_array_is_returned(): void
    {
        $httpClientFacade = $this->createMock(HttpClientFacadeInterface::class);
        $httpClientFacade->method('post')->willReturn($this->httpClientResponse());
        $auth = new AccessToken($httpClientFacade);

        $response = $auth->getArray('sonia@spryker.com', 'change123');

        self::assertEquals('def50200d83a259cab4151d18856d3ca2c89c018d91a25dcc9ecff549d73dff2b9a308882d79c2edb5e5e395ce8c62afec49d96b8bcbb72c6fa6851d32944afae10c2dc323a3076b2ccb43e86dbb99cd91a7c462109f8bf1d425649a9eec07a739bf4815e03f59c7b12e78031b6c151154a6ef1b72b14e7fc0ae920c26c7548464f77439edf5033aeac1e410d0b97ab5c68519f1ba5d0080314877d3792507d00bcba8ee8ac4f51eaae341dab6aafa2053685703b2cc39df4e99bc601a49c5682d81d84b280984449e574e5367b8e9c4e01833de23c8ea27806d3df282eab5d21303481532dde8149564e935eda1dcf57765a628f175e1289e7617f009c362aa4132e6ac1ce2b387d5aadf818147334932a8e4b9e034fdb71a6db9e238279240d4bc7e5962371b87bba24a42bc9f7b041b868f0097a0b9ffbe29b46d6b4be51c12fbea5bcd5df4149e2a2046809a94da104e4ce81601dd7e91fe341f39e482d4a488a3b114c3ba8294f1a7735612feb1bc7c45cdf23ef8e483e1949ed64007ec93f45ab7da2435c4daf1db23708b11c481b5e59dfe7cadded818c08a329e4632e1f4be3e6bff5afccb9107906347ce8a149235e6b4cc781adabe4b', $response['data']['attributes']['refreshToken']);
        $this->assertIsArray($response);
    }

    private function httpClientResponse(): array
    {
        return json_decode(
            '{"data":{"type":"access-tokens","id":null,"attributes":{"tokenType":"Bearer","expiresIn":28800,"accessToken":"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiJmcm9udGVuZCIsImp0aSI6IjZlYzY2YmY4N2U5MWQ5MTJkMDMyMjlkZWVjZmIyNWU0YjZiMDYxMWYxYzlkOGY3MjU1NzkxODJiMDJlOTRkYjM4NTMyZTI4MTA2ZTY3YWE3IiwiaWF0IjoxNjY2NjUwNDA0LCJuYmYiOjE2NjY2NTA0MDQsImV4cCI6MTY2NjY3OTIwNCwic3ViIjoie1wiaWRfYWdlbnRcIjpudWxsLFwiY3VzdG9tZXJfcmVmZXJlbmNlXCI6XCJERS0tMjFcIixcImlkX2N1c3RvbWVyXCI6MjF9Iiwic2NvcGVzIjpbImN1c3RvbWVyIl19.feQYy9aCjQM5vBMf-j6s6V6Qkk0_AIzIlyW8SO6DDOoHLyhv0kUpOv8Y0F-JO5VqM_MbTaiKGIw9pDXKiZUo2AE9OtOX6F8YTrlIMh9KKoAQ4JQcszz5_zbttj5qtnfiHovBdQdTlx0Uk6uCEZhvX6b51xWcV-KJiuSlLu4GBLgCl1B0WBVKjxLgDhZJdvNz7txtckwDq94rjLBKLx0C3JrpVjt1EMWXvw3tA1NB3NV3WPWU3aBo_lJ2mdLSxbdl1QyJQOg_Gw6oyK4WMcrPsQenGD5XsC2YdVj--XABmiv1mxk7_kzXoPQd9ZA8pTIqdGGsfjPzK_Tr7Ue0Q70BgQ","refreshToken":"def50200d83a259cab4151d18856d3ca2c89c018d91a25dcc9ecff549d73dff2b9a308882d79c2edb5e5e395ce8c62afec49d96b8bcbb72c6fa6851d32944afae10c2dc323a3076b2ccb43e86dbb99cd91a7c462109f8bf1d425649a9eec07a739bf4815e03f59c7b12e78031b6c151154a6ef1b72b14e7fc0ae920c26c7548464f77439edf5033aeac1e410d0b97ab5c68519f1ba5d0080314877d3792507d00bcba8ee8ac4f51eaae341dab6aafa2053685703b2cc39df4e99bc601a49c5682d81d84b280984449e574e5367b8e9c4e01833de23c8ea27806d3df282eab5d21303481532dde8149564e935eda1dcf57765a628f175e1289e7617f009c362aa4132e6ac1ce2b387d5aadf818147334932a8e4b9e034fdb71a6db9e238279240d4bc7e5962371b87bba24a42bc9f7b041b868f0097a0b9ffbe29b46d6b4be51c12fbea5bcd5df4149e2a2046809a94da104e4ce81601dd7e91fe341f39e482d4a488a3b114c3ba8294f1a7735612feb1bc7c45cdf23ef8e483e1949ed64007ec93f45ab7da2435c4daf1db23708b11c481b5e59dfe7cadded818c08a329e4632e1f4be3e6bff5afccb9107906347ce8a149235e6b4cc781adabe4b"},"links":{"self":"https:\/\/glue.de.b2c.demo-spryker.com\/access-tokens"}}}',
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    }
}
