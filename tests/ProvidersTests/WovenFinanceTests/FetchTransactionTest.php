<?php

namespace ProvidersTests\WovenFinanceTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngineSDK;

class FetchTransactionTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "unique_reference"  => "SPKL10000762969101207822161484047769",
        ];

        $header = [ // Additional Headers...
            'api-secret'                => '1',
            'requestId'                 => '023089fc-4b48-40b9-a20b-f0e2eefd8c4c'
        ];

        $fsiEngineSDK = new FsiEngineSDK(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processListTransactionsProvider = $fsiEngineSDK->processWovenFinanceProvider()->FetchTransaction;
        $response = $processListTransactionsProvider->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);

    }
}