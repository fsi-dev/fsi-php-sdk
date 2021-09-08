<?php

namespace ProvidersTests\EcoBankTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngineSDK;

class MerchantCategoryCodeTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "requestId"             => "123344",
            "affiliateCode"         => "EGH",
            "requestToken"          => "/4mZF42iofzo7BDu0YtbwY6swLwk46Z91xItybhYwQGFpaZNOpsznL/9fca5LkeV",
            "sourceCode"            => "ECOBANK_QR_API",
            "sourceChannelId"       => "KANZAN",
            "requestType"           => "CREATE_MERCHANT"
        ];

        $header = [ // Additional Headers...
            'origin'                    => 'developer.ecobank.com',
            'Accept'                    => 'application/json',
            'Authorization'             => 'Bearer 85dc50e24f6f36850f48390be3516c518acdc427c5c5113334c'
        ];

        $fsiEngineSDK = new FsiEngineSDK(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processMerchantCategoryCodeProvider = $fsiEngineSDK->processEcobankProvider()->MerchantCategoryCode;
        $response = $processMerchantCategoryCodeProvider->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);

    }
}