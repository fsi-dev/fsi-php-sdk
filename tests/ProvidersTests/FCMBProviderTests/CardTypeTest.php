<?php

namespace ProvidersTests\FCMBProviderTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class CardTypeTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "cardName"               => "string",
        ];

        $header = [ // Additional Headers...
            'x-ibm-client-id'           => 'f',
            'Accept'                    => 'application/json'
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processCardTypeProvider = FsiEngine::FCMBProvider()->CardType;
        $response = $processCardTypeProvider->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);

    }
}