<?php

namespace ProvidersTests\FCMBProviderTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class InternalTransferDaterangeTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "startDate"        => "09-03-2021",
            "endDate"          => "09-07-2021",
            "pageNum"          => "3",
            "pageSize"         => "10"
        ];

        $header = [ // Additional Headers...
            'x-ibm-client-id'           => 'f',
            'Accept'                    => 'application/json'
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processInternalTransferDaterangeProvider = FsiEngine::FCMBProvider()->InternalTransferDaterange;
        $response = $processInternalTransferDaterangeProvider->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);

    }
}