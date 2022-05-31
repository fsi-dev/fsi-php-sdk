<?php

namespace ProvidersTests\SterlingBankProviderTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class GetBillersISWTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "Referenceid"           => '01',
            "RequestType"           => '01',
            "Translocation"         => '01',
            "Bvn"                   => '01139174927',
            "billerid"              => '01'

        ];
        $header = [ // Additional Headers...
            'Ocp-Apim-Subscription-Key' => 't',
            'Ocp-Apim-Trace'            => 'true',
            'Appid'                     => 69,
            'ipval'                     => 0
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processGetBillersISWProvider = FsiEngine::SterlingBankProvider()->GetBillersISW;
        $response = $processGetBillersISWProvider->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);


    }
}