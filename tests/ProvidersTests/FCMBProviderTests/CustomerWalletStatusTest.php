<?php

namespace ProvidersTests\FCMBProviderTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngineSDK;

class CustomerWalletStatusTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "internalAccountNumber" => "0102033119",
            "status"                => true,
            "modifiedBy"            => "tunde"

        ];

        $header = [ // Additional Headers...
            'x-ibm-client-id'           => 'f',
            'Accept'                    => 'application/json'
        ];

        $fsiEngineSDK = new FsiEngineSDK(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processCustomerWalletStatusProvider = $fsiEngineSDK->processFCMBProvider()->CustomerWalletStatus;
        $response = $processCustomerWalletStatusProvider->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);

    }
}