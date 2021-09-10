<?php

namespace ProvidersTests\SterlingBankProviderTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class InterbankTransferTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "Referenceid"           => "0101",
            "RequestType"           => "01",
            "Translocation"         => "0101",
            "SessionID"             => "01",
            "FromAccount"           => "01",
            "ToAccount"             => "01",
            "Amount"                => "01",
            "DestinationBankCode"   => "01",
            "NEResponse"            => "01",
            "BenefiName"            => "01",
            "PaymentReference"      => "01",
            "OriginatorAccountName" => "01",
            "translocation"         => "01"

        ];
        $header = [ // Additional Headers...
            'Ocp-Apim-Subscription-Key' => 't',
            'Ocp-Apim-Trace'            => 'true',
            'Appid'                     => '69',
            'ipval'                     => '0'
        ];
        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processInterbankTransferProvider = FsiEngine::SterlingBankProvider()->InterbankTransfer;
        $response = $processInterbankTransferProvider->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;

        }

        $this->assertEquals(200, $response);


    }
}