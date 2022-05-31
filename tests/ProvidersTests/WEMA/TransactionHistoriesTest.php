<?php

use FsiEngine\SDK\FsiEngine;
class TransactionHistoriesTest extends \PHPUnit\Framework\TestCase
{

    public function testAdd() {

        $formData = [
            "accountNumber" => "string",
            "from" => "string",
            "to" => "string"
        ];

        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];

        FsiEngine::init(\FsiEngine\Constants\Meta::TESTING_APP_KEY, \FsiEngine\Constants\Meta::TESTING_DEPLOYMENT_TYPE);
        $wemaService = FsiEngine::WemaProvider()->TransactionHistories;
        $response = $wemaService->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }


}