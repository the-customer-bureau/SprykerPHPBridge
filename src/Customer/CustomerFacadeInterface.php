<?php

declare(strict_types=1);

namespace Engineered\Customer;

interface CustomerFacadeInterface
{
    public function get(string $bearerToken): array;

    public function getId(string $bearerToken): string;

    public function getAttributes(string $bearerToken): array;

    public function generateCustomerUniqueId(): string;
}
