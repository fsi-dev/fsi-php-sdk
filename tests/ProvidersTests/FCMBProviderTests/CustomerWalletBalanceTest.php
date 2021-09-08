<?php

namespace ProvidersTests\FCMBProviderTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngineSDK;

class CustomerWalletBalanceTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "AccountNumber"           => "0148037892",

        ];

        $header = [ // Additional Headers...
            'x-ibm-client-id'           => 'f',
            'Accept'                    => 'application/json'
        ];

        $fsiEngineSDK = new FsiEngineSDK(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processCustomerWalletBalanceProvider = $fsiEngineSDK->processFCMBProvider()->CustomerWalletBalance;
        $response = $processCustomerWalletBalanceProvider->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);

    }
}