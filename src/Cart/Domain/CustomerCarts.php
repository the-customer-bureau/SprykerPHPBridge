<?php

declare(strict_types=1);

namespace Engineered\Cart\Domain;

use Engineered\HttpClient\HttpClientFacadeInterface;

class CustomerCarts
{
    private const CARTS_ENDPOINT = 'carts';
    private const CUSTOMER_CARTS_ENDPOINT = 'customers/%s/carts';
    private const CUSTOMER_ADD_TO_CART_ENDPOINT = 'carts/%s/items';
    private const CART_ITEMS_ENDPOINT = 'items';

    public function __construct(
        private HttpClientFacadeInterface $httpClient,
        private string $currency,
        private string $store,
    ) {
    }

    public function get(string $customerId, string $bearerToken, array $include = null): array
    {
        return $this->httpClient->getProtected(sprintf(self::CUSTOMER_CARTS_ENDPOINT, $customerId), $bearerToken, $include);
    }

    public function addToCustomersCart(string $sku, int $quantity, string $bearerToken, string $cartId = null): array
    {
        if (!$cartId) {
            $newCart = $this->httpClient->post(
                self::CARTS_ENDPOINT,
                $this->getNewCartPayload(),
                null,
                $bearerToken
            );

            $cartId = $newCart['data']['id'];
        }

        return $this->httpClient->post(
            sprintf(self::CUSTOMER_ADD_TO_CART_ENDPOINT, $cartId) . '?',
            $this->getPayload($sku, $quantity),
            null,
            $bearerToken
        );
    }

    private function getNewCartPayload(): array
    {
        $payload = [];

        $payload['data']                            = [];
        $payload['data']['type']                    = self::CARTS_ENDPOINT;
        $payload['data']['attributes']['name']      = uniqid('mycart', false);
        $payload['data']['attributes']['priceMode'] = 'GROSS_MODE';
        $payload['data']['attributes']['currency']  = $this->currency;
        $payload['data']['attributes']['store']     = $this->store;

        return $payload;
    }

    private function getPayload(string $sku, int $quantity): array
    {
        $payload = [];

        $payload['data']                           = [];
        $payload['data']['type']                   = self::CART_ITEMS_ENDPOINT;
        $payload['data']['attributes']['sku']      = $sku;
        $payload['data']['attributes']['quantity'] = $quantity;

        return $payload;
    }
}
