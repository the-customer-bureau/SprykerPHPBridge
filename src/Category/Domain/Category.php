<?php

declare(strict_types=1);

namespace Engineered\Category\Domain;

use Engineered\HttpClient\HttpClientFacadeInterface;

class Category
{
    public const CATEGORY_TREES_ENDPOINT = 'category-trees';
    private const CATEGORY_NODES_ENDPOINT = 'category-nodes';

    public function __construct(
        private HttpClientFacadeInterface $httpClient
    ) {
    }

    public function get(int $id): array
    {
        return $this->httpClient->get(self::CATEGORY_NODES_ENDPOINT . '/' . $id);
    }

    public function getTree(): array
    {
        return $this->httpClient->get(self::CATEGORY_TREES_ENDPOINT);
    }
}
