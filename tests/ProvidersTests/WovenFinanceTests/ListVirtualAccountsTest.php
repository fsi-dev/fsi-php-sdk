<?php

namespace ProvidersTests\WovenFinanceTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class ListVirtualAccountsTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            'page'                => '1',
            'status'              => 'ACTIVE',
            'from'                => '2010-08-14 13:48',
            'account_reference'   => 'customer-001'
        ];

        $header = [ // Additional Headers...
            'api-secret'                => '1',
            'requestId'                 => '023089fc-4b48-40b9-a20b-f0e2eefd8c4c'
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processListVirtualAccountsProvider = FsiEngine::WovenFinanceProvider()->ListVirtualAccounts;
        $response = $processListVirtualAccountsProvider->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);

    }


}