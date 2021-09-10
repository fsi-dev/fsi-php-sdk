<?php

namespace ProvidersTests\AfricasTalkingProviderTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class DeletePremiumTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "username"          => "sandbox",
            "phoneNumber"       => "+2348120534617",
            "shortCode"         => "1234",
            "keyword"           => "feed"
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processDeletePremiumProvider = FsiEngine::AfricasTalkingProvider()->DeletePremium;
        $response = $processDeletePremiumProvider->send($formData);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }
        $this->assertEquals(200, $response);


    }
}