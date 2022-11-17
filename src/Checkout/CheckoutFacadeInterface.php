<?php

declare(strict_types=1);

namespace Engineered\Checkout;

/**
 * @method CheckoutFactory getFactory()
 */
interface CheckoutFacadeInterface
{
    public function guestCheckout(string $customerUniqueId, array $postData): array;
    public function buildCheckoutPostData(string $cartId, array $customer, array $billingAddress, array $payments, array $shipments): array;
}
