<?php

declare(strict_types=1);

namespace Engineered\ConcreteProduct;

interface ConcreteProductFacadeInterface
{
    public function get(string $sku): array;

    public function getReviewCount(string $sku): int;

    public function getName(string $sku): string;

    public function getDescription(string $sku): string;

    public function getMetaTitle(string $sku): string;

    public function getMetaKeywords(string $sku): string;

    public function getMetaDescription(string $sku): string;
}
