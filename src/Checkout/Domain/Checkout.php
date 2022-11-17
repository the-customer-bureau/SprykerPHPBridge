<?php

declare(strict_types=1);

namespace Engineered\Checkout\Domain;

use Engineered\HttpClient\HttpClientFacadeInterface;

class Checkout
{
    public const CHECKOUT_ENDPOINT = 'checkout';

    public function __construct(
        private HttpClientFacadeInterface $httpClient
    ) {
    }

    public function guestCheckout(string $customerUniqueId, array $postData): array
    {
        return $this->httpClient->post(
            self::CHECKOUT_ENDPOINT,
            $postData,
            $this->getHeaders($customerUniqueId)
        );
    }

    public function buildCheckoutPostData(string $cartId, array $customer, array $billingAddress, array $payments, array $shipments): array
    {
        $payload = [];

        $payload['data']                                 = [];
        $payload['data']['type']                         = self::CHECKOUT_ENDPOINT;
        $payload['data']['attributes']['customer']       = $customer;
        $payload['data']['attributes']['idCart']         = $cartId;
        $payload['data']['attributes']['billingAddress'] = $billingAddress;
        $payload['data']['attributes']['payments']       = $payments;
        $payload['data']['attributes']['shipments']      = $shipments;

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
