<?php

namespace ProvidersTests\FCMBProviderTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngineSDK;

class B2BInternalTransfersTest  extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "debitAccountNo"        => "0000000000",
            "creditAccountNo"       => "0000000000",
            "amount"                => 19,
            "narration"             => "Test Transfer",
            "remark"                => "Test",
            "reportCode"            => "Transfer"
        ];

        $header = [ // Additional Headers...
            'x-ibm-client-id'           => 'f',
            'Accept'                    => 'application/json'
        ];

        $fsiEngineSDK = new FsiEngineSDK(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processB2BTransferProvider = $fsiEngineSDK->processFCMBProvider()->B2BInternalTransfers;
        $response = $processB2BTransferProvider->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);

    }
}