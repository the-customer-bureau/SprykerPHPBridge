<?php

declare(strict_types=1);

namespace Engineered\Cart\Domain;

use Engineered\HttpClient\HttpClientFacadeInterface;

class Checkout
{
    public function __construct(HttpClientFacadeInterface $httpClient)
    {
    }

	
}
