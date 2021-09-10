<?php

namespace ProvidersTests\WovenFinanceTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class CreateExistingCustomerVirtualAccountTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "customer_reference"            => "Pasdclde15",
            "expires_on"                    => "2021-11-01",
            "use_frequency"                 => "5",
            "min_amount"                    => 100,
            "max_amount"                    => 12000,
            "callback_url"                  => "https://requesturl.com",
            "destination_nuban"             => ""
        ];

        $header = [ // Additional Headers...
            'api-secret'                => 'vb_ls_bfac75fe54a952841971b6918d06aeb2659523dc92d6',
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processCreateExistingCustomerVirtualAccountProvider = FsiEngine::WovenFinanceProvider()->CreateExistingCustomerVirtualAccount;
        $response = $processCreateExistingCustomerVirtualAccountProvider->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);

    }
}