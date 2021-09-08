<?php

namespace ProvidersTests\WovenFinanceTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngineSDK;

class CreateVirtualAccountTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "customer_reference"        => "Granville5",
            "name"                      => "Saul Kiehn",
            "email"                     => "jones_adelaide@mail.com",
            "mobile_number"             => "08012345678",
            "expires_on"                => "2021-11-01",
            "use_frequency"             => "5",
            "min_amount"                => 100,
            "max_amount"                => 12000,
            "callback_url"              => "https://requesturl.com",
            "destination_nuban"         => "",
            "meta_data"         => [
                "somedatakey"           => "somedatavalue"
            ]
        ];

        $header = [ // Additional Headers...
            'api-secret'                => 'vb_ls_bfac75fe54a952841971b6918d06aeb2659523dc92d6',
        ];

        $fsiEngineSDK = new FsiEngineSDK(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processCreateVirtualAccountProvider = $fsiEngineSDK->processWovenFinanceProvider()->CreateVirtualAccount;
        $response = $processCreateVirtualAccountProvider->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);

    }
}