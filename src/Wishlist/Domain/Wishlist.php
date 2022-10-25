<?php

declare(strict_types=1);

namespace Engineered\Wishlist\Domain;

use Engineered\HttpClient\HttpClientFacadeInterface;

final class Wishlist
{
    public const WISHLISTS_ENDPOINT = 'wishlists';
    public const WISHLIST_ITEMS_ENDPOINT = 'wishlist-items';

    public function __construct(
        private HttpClientFacadeInterface $httpClient,
    ) {
    }

    public function get(string $wishlistId, string $bearerToken): array
    {
        return $this->httpClient->getProtected(self::WISHLISTS_ENDPOINT . '/' . $wishlistId, $bearerToken);
    }

    public function getName(string $wishlistId, string $bearerToken): string
    {
        $response = $this->get($wishlistId, $bearerToken);

        return $response['data']['attributes']['name'];
    }

    public function getList(string $bearerToken): array
    {
        return $this->httpClient->getProtected(self::WISHLISTS_ENDPOINT, $bearerToken);
    }

    public function create(string $name, string $bearerToken): array
    {
        return $this->httpClient->post(self::WISHLISTS_ENDPOINT, $this->getCreationPayload($name), null, $bearerToken);
    }

    public function add(string $wishlistId, string $sku, string $bearerToken): array
    {
        return $this->httpClient->post(
            self::WISHLISTS_ENDPOINT . '/' . $wishlistId . '/' . self::WISHLIST_ITEMS_ENDPOINT,
            $this->getAdditionPayload($sku),
            null,
            $bearerToken
        );
    }

    public function delete(string $wishlistId, string $sku, string $bearerToken): array
    {
        return $this->httpClient->delete(self::WISHLISTS_ENDPOINT . '/' . $wishlistId, [], null, $bearerToken);
    }

    private function getCreationPayload(string $name): array
    {
        $payload = [];

        $payload['data']                       = [];
        $payload['data']['type']               = self::WISHLISTS_ENDPOINT;
        $payload['data']['attributes']['name'] = $name;

        return $payload;
    }

    private function getAdditionPayload(string $sku): array
    {
        $payload = [];

        $payload['data']                      = [];
        $payload['data']['type']              = self::WISHLIST_ITEMS_ENDPOINT;
        $payload['data']['attributes']['sku'] = $sku;

        return $payload;
    }
}
