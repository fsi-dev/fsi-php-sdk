<?php

namespace ProvidersTests\AfricasTalkingProviderTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class QueueStatusTest extends \PHPUnit\Framework\TestCase
{

    public function testAdd() {

        $formData = [
            "username"          => "sandbox",
            "phoneNumbers"      => "+2348120534617, +2349057969601"
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processQueueStatusProvider = FsiEngine::AfricasTalkingProvider()->QueueStatus;
        $response = $processQueueStatusProvider->send($formData);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);

    }



}