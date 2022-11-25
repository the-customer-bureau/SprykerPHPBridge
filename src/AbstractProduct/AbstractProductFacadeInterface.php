<?php

declare(strict_types=1);

namespace Engineered\AbstractProduct;

interface AbstractProductFacadeInterface
{
    public function get(string $sku): array;

    public function getReviewCount(string $sku): int;

    public function getName(string $sku): string;

    public function getDescription(string $sku): string;

    public function getMetaTitle(string $sku): string;

    public function getMetaKeywords(string $sku): string;

    public function getMetaDescription(string $sku): string;

    public function getRelated(string $sku): array;

    public function getAbstractProductsByCategoryId(int $categoryId): array;
}
