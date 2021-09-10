<?php

namespace ProvidersTests\AfricasTalkingProviderTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class FetchMessageTest extends \PHPUnit\Framework\TestCase
{

    public function testAdd() {

        $formData = [
            "username" => "sandbox",
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processMessageProvider = FsiEngine::AfricasTalkingProvider()->Message;
        $response = $processMessageProvider->send($formData);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);


    }
}