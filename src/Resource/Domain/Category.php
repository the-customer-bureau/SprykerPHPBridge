<?php

declare(strict_types=1);

namespace Engineered\Resource\Domain;

use Engineered\HttpClient\HttpClientFacadeInterface;

class Category
{
    private const CATEGORY_NODES_ENDPOINT = 'category-nodes';

    public function __construct(
        private HttpClientFacadeInterface $httpClient
    ) {
    }

    public function get(int $id): array
    {
        return $this->httpClient->get(self::CATEGORY_NODES_ENDPOINT . '/' . $id);
    }
}
