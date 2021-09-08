<?php

namespace FsiEngine\Providers\Support;

use FsiEngine\Constants\Meta;

interface ProviderInterface
{
    /**
     * @param $apiKey
     * @param string $environmentURL
     */
    public function  __construct($apiKey, $environmentURL = Meta::SANDBOX_URL);

    /**
     * @return mixed
     */
    public function providerServices();
}