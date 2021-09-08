<?php

namespace ProvidersTests\SterlingBankProviderTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngineSDK;

class InterbankNameEnquiryTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "Referenceid"           => 01,
            "RequestType"           => 01,
            "Translocation"         => 01,
            "ToAccount"             => 0037514056,
            "destinationbankcode"   => 000001

        ];
        $header = [ // Additional Headers...
            'Ocp-Apim-Subscription-Key' => 't',
            'Ocp-Apim-Trace'            => 'true',
            'Appid'                     => 69,
            'ipval'                     => 0
        ];
        $fsiEngineSDK = new FsiEngineSDK(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processInterbankNameEnquiryProvider = $fsiEngineSDK->processSterlingBankProvider()->InterbankNameEnquiry;
        $response = $processInterbankNameEnquiryProvider->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;

        }

        $this->assertEquals(200, $response);


    }
}