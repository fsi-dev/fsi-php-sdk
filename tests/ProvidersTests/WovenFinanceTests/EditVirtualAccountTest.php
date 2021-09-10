<?php

namespace ProvidersTests\WovenFinanceTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class EditVirtualAccountTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "expires_on"            => "2021-11-01",

            "use_frequency"         => "5",

            "min_amount"            => 2000,

            "max_amount"            => 12000,

            "callback_url"          => "http://callbackurl.com",

            "meta_data"             => [ "somedatakey" => "somedatavalue"],

            "destination_nuban"     => "0427521260"
        ];

        $header = [ // Additional Headers...
            'api-secret'                => '1',
            'requestId'                 => '023089fc-4b48-40b9-a20b-f0e2eefd8c4c'
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processEditVirtualAccountProvider = FsiEngine::WovenFinanceProvider()->EditVirtualAccount;
        $response = $processEditVirtualAccountProvider->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);

    }
}