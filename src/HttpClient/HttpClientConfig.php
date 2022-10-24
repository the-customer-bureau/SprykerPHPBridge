<?php

declare(strict_types=1);

namespace Engineered\HttpClient;

use Gacela\Framework\AbstractConfig;

final class HttpClientConfig extends AbstractConfig
{
    public function getGlueUrl(): string
    {
        return (string)$this->get('GLUE_API_URL');
    }
}
