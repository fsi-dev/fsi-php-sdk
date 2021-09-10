<?php

namespace ProvidersTests\AfricasTalkingProviderTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class TransactionStatusTest extends \PHPUnit\Framework\TestCase
{

    public function testAdd() {

        $formData = [
            "username"  => "sandbox",
            "to"        => "+2348120534617",
            "message"   => "up town girl"
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processSMSProvider = FsiEngine::AfricasTalkingProvider()->Sms;
        $response = $processSMSProvider->send($formData);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);


    }

}