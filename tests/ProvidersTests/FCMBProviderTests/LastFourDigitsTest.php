<?php

namespace ProvidersTests\FCMBProviderTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class LastFourDigitsTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "lastFourDigits" => "4151",
            "accountNumber" => "4303769016"
        ];

        $header = [ // Additional Headers...
            'x-ibm-client-id'           => 'f',
            'Accept'                    => 'application/json'
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processLastFourDigitsProvider = FsiEngine::FCMBProvider()->LastFourDigits;
        $response = $processLastFourDigitsProvider->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);

    }
}