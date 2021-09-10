<?php

namespace ProvidersTests\AfricasTalkingProviderTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

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
        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processAirtimeProvider = FsiEngine::AfricasTalkingProvider()->Airtime;
        $response = $processAirtimeProvider->send($formData);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);


    }
}