<?php

namespace FsiEngine\Providers\Support;

use FsiEngine\Constants\Meta;

interface PayloadInterface
{

    /**
     * @param $apiKey
     * @param string $environmentURL
     */
    public function  __construct($apiKey, $environmentURL = Meta::SANDBOX_URL);

    /**
     * @param array $formData
     * @return mixed
     */
    public function send(array $formData, array $additionalHeaders = []);

}