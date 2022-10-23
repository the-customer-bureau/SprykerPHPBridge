<?php

declare(strict_types=1);

namespace Engineered\Cart\Domain;

use Engineered\HttpClient\HttpClientFacadeInterface;

class GuestCartItems
{
    private const GUEST_CART_ITEMS_ENDPOINT = 'guest-cart-items';

    public function __construct(
        private HttpClientFacadeInterface $httpClient
    ) {
    }

    public function add(
        string $concreteSku,
        int $quantity,
        string $customerUniqueId,
        string $id = null,
        ?string $returnAttribute = null
    ): array|string {
        $response = $this->httpClient->post(self::GUEST_CART_ITEMS_ENDPOINT, $this->getPayload($concreteSku, $quantity), $this->getHeaders($customerUniqueId));

        if (!$returnAttribute) {
            return $response;
        }
        if ($returnAttribute === 'id') {
            return $response['data']['id'];
        }

        if (str_contains($returnAttribute, '_')) {
            $returnAttributeArray = explode('_', $returnAttribute);

            return $response['data']['attributes'][$returnAttributeArray[0]][$returnAttributeArray[1]];
        }

        return $response['data']['attributes'][$returnAttribute];
    }

    private function getPayload(string $concreteSku, int $quantity = 1): array
    {
        $payload = [];

        $payload['data']                           = [];
        $payload['data']['type']                   = self::GUEST_CART_ITEMS_ENDPOINT;
        $payload['data']['attributes']['sku']      = $concreteSku;
        $payload['data']['attributes']['quantity'] = $quantity;

        return $payload;
    }

    private function getHeaders(string $customerUniqueId): array
    {
        return [
            'X-Anonymous-Customer-Unique-Id: ' . $customerUniqueId,
            'Content-Type: text/plain',
        ];
    }
}
