<?php

namespace ProvidersTests\FCMBProviderTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class ATMPinTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "pan"               => "Tcx+B7109UY+sSooND8ZrFm4OMuFzMF6dzHQ5lbt9r8=",
            "atmPin"            => "C1cRxRUSRkArWinTxk27pw==",
            "accountNumber"     => "1715308017",
            "expiryDate"        => "2004"
        ];

        $header = [ // Additional Headers...
            'x-ibm-client-id'           => 'f',
            'Accept'                    => 'application/json'
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processATMPinProvider = FsiEngine::FCMBProvider()->ATMPin;
        $response = $processATMPinProvider->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);

    }
}