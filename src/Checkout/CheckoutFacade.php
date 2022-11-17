<?php

declare(strict_types=1);

namespace Engineered\Checkout;

use Gacela\Framework\AbstractFacade;

/**
 * @method CheckoutFactory getFactory()
 */
final class CheckoutFacade extends AbstractFacade implements CheckoutFacadeInterface
{
    public function guestCheckout(string $customerUniqueId, array $postData): array
    {
        return $this->getFactory()
            ->createCheckout()
            ->guestCheckout($customerUniqueId, $postData);
    }

    public function buildCheckoutPostData(string $cartId, array $customer, array $billingAddress, array $payments, array $shipments): array
    {
        return $this->getFactory()
            ->createCheckout()
            ->buildCheckoutPostData($cartId, $customer, $billingAddress, $payments, $shipments);
    }
}
