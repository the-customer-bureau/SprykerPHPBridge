<?php

declare(strict_types=1);

namespace Engineered\Resource;

interface ResourceFacadeInterface
{
    public function getCategory(int $id): array;

    public function getAbstractProduct(string $sku): array;

    public function getRelatedAbstractProducts(string $sku): array;

    public function getConcreteProduct(string $sku): array;

    public function getReviewCount(string $sku): int;

    public function getName(string $sku): string;

    public function getDescription(string $sku): string;

    public function getMetaTitle(string $sku): string;

    public function getMetaKeywords(string $sku): string;

    public function getMetaDescription(string $sku): string;
}
