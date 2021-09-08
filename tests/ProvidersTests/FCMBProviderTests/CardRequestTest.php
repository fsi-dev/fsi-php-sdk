<?php

namespace ProvidersTests\FCMBProviderTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngineSDK;

class CardRequestTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "reasonRequestId"           => "01",
            "cardProductId"             => "1001",
            "deliveryTypeId"            => "2001",
            "accountNumber"             => "any:string",
            "accountName"               => "any:string",
            "branchSOL"                 => "any:string"
        ];

        $header = [ // Additional Headers...
            'x-ibm-client-id'           => 'f',
            'Accept'                    => 'application/json'
        ];

        $fsiEngineSDK = new FsiEngineSDK(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processCardRequestProvider = $fsiEngineSDK->processFCMBProvider()->CardRequest;
        $response = $processCardRequestProvider->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);

    }
}