<?php

declare(strict_types=1);

namespace Engineered\Customer;

use Exception;
use Gacela\Framework\AbstractFacade;

/**
 * @method CustomerFactory getFactory()
 */
final class CustomerFacade extends AbstractFacade implements CustomerFacadeInterface
{
    public function get(string $bearerToken): array
    {
        return $this->getFactory()
            ->createCustomer()
            ->get($bearerToken);
    }

    public function getId(string $bearerToken): string
    {
        return $this->getFactory()
            ->createCustomer()
            ->getId($bearerToken);
    }

    public function getAttributes(string $bearerToken): array
    {
        return $this->getFactory()
            ->createCustomer()
            ->getAttributes($bearerToken);
    }

    /**
     * @throws Exception
     */
    public function generateCustomerUniqueId(): string
    {
        return $this->getFactory()
            ->createCustomer()
            ->generateCustomerUniqueId();
    }
}
