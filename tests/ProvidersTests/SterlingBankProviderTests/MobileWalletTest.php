<?php

namespace ProvidersTests\SterlingBankProviderTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class MobileWalletTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "Referenceid"       => "01",
            "RequestType"       => "0",
            "Translocation"     => "01",
            "amt"               => "01",
            "tellerid"          => "01",
            "frmacct"           => "01",
            "toacct"            => "01",
            "exp_code"          => "01",
            "paymentRef"        => "01",
            "remarks"           => "01"

        ];
        $header = [ // Additional Headers...
            'Ocp-Apim-Subscription-Key' => 't',
            'Ocp-Apim-Trace'            => 'true',
            'Appid'                     => '69',
            'ipval'                     => '0'
        ];
        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processMobileWalletProvider = FsiEngine::SterlingBankProvider()->MobileWallet;
        $response = $processMobileWalletProvider->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;

        }

        $this->assertEquals(200, $response);


    }

}