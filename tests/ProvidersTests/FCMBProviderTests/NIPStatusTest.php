<?php

namespace ProvidersTests\FCMBProviderTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class NIPStatusTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "traceid"    => "QAEFWFFDS123"
        ];

        $header = [ // Additional Headers...
            'x-ibm-client-id'           => 'f',
            'Accept'                    => 'application/json'
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processNIPStatusProvider = FsiEngine::FCMBProvider()->NIPStatus;
        $response = $processNIPStatusProvider->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);

    }
}