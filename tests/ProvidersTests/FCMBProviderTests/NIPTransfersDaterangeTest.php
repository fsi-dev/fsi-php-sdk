<?php

namespace ProvidersTests\FCMBProviderTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class NIPTransfersDaterangeTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "startDate"        => "09-02-2021",
            "endDate"          => "10-06-2021",
            "pageNum"          => "3",
            "pageSize"         => "10"
        ];

        $header = [ // Additional Headers...
            'x-ibm-client-id'           => 'f',
            'Accept'                    => 'application/json'
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processNIPTransfersDaterangeProvider = FsiEngine::FCMBProvider()->NIPTransfersDaterange;
        $response = $processNIPTransfersDaterangeProvider->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);

    }
}