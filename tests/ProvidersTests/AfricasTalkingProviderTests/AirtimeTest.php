<?php

namespace ProvidersTests\AfricasTalkingProviderTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngineSDK;

class AirtimeTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "username"      => "sandbox",
            "recipients"    => [
                [
                    "phoneNumber"   => "+2348120534617",
                    "amount"        => "100"
                ],
                [
                    "phoneNumber"   => "2348120534617",
                    "amount"        => "200"
                ]
            ]
        ];
        $fsiEngineSDK = new FsiEngineSDK(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processAirtimeProvider = $fsiEngineSDK->processAfricasTalkingProvider()->Airtime;
        $response = $processAirtimeProvider->send($formData);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);


    }
}