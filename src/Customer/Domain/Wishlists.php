<?php

declare(strict_types=1);

namespace Engineered\Customer\Domain;

use Engineered\HttpClient\HttpClientFacadeInterface;

class Wishlists
{
    public const WISHLISTS_ENDPOINT = 'wishlists';
    public const WISHLIST_ITEMS_ENDPOINT = 'wishlist-items';

    public const ATTRIBUTE_ID = 'id';
    public const ATTRIBUTE_NAME = 'name';
    public const ATTRIBUTE_NUMBER_OF_ITEMS = 'numberOfItems';
    public const ATTRIBUTE_CREATED_AT = 'createdAt';
    public const ATTRIBUTE_UPDATED_AT = 'updatedAt';

    public function __construct(
        private HttpClientFacadeInterface $httpClient,
    ) {
    }

    public function get(string $wishlistId, string $bearerToken): array
    {
        return $this->httpClient->getProtected(self::WISHLISTS_ENDPOINT . '/' . $wishlistId, $bearerToken);
    }

    public function getList(string $bearerToken): array
    {
        return $this->httpClient->getProtected(self::WISHLISTS_ENDPOINT, $bearerToken);
    }

    public function create(string $name, string $bearerToken, ?string $returnAttribute = null): array|string
    {
        $response = $this->httpClient->post(self::WISHLISTS_ENDPOINT, $this->getCreationPayload($name), null, $bearerToken);

        if (!$returnAttribute) {
            return $response;
        }
        if ($returnAttribute === 'id') {
            return $response['data']['id'];
        }

        return $response['data']['attributes'][$returnAttribute];
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
