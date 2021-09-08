<?php

namespace ProvidersTests\AfricasTalkingProviderTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngineSDK;

class VoiceCallTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "username"  => "sandbox",
            "from"      => "+2349096651299",
            "to"        => "+2348120534617, +2349057969601"
        ];

        $fsiEngineSDK = new FsiEngineSDK(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processVoiceCallProvider = $fsiEngineSDK->processAfricasTalkingProvider()->VoiceCall;
        $response = $processVoiceCallProvider->send($formData);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);

    }
}