<?php

namespace ProvidersTests\FCMBProviderTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngineSDK;

class CustomerWalletNewTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "customerId"        => "string",
            "schemeCode"        => "string",
            "walletStatus"      => true,
            "createdBy"         => "tunde",
            "accountName"       => "ebuka"

        ];

        $header = [ // Additional Headers...
            'x-ibm-client-id'           => 'f',
            'Accept'                    => 'application/json'
        ];

        $fsiEngineSDK = new FsiEngineSDK(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processCustomerWalletNewProvider = $fsiEngineSDK->processFCMBProvider()->CustomerWalletNew;
        $response = $processCustomerWalletNewProvider->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);

    }
}