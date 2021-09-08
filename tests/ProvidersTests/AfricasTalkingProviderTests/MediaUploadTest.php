<?php

namespace ProvidersTests\AfricasTalkingProviderTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngineSDK;

class MediaUploadTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "username"  => "sandbox",
            "url"        => "https://fsi-core-dev.inits.dev/api"
        ];

        $fsiEngineSDK = new FsiEngineSDK(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processMediaUploadProvider = $fsiEngineSDK->processAfricasTalkingProvider()->MediaUpload;
        $response = $processMediaUploadProvider->send($formData);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }
}