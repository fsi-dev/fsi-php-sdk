<?php

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class CreateMerchantTest extends \PHPUnit\Framework\TestCase
{

    public function testAdd() {

        $formData = [

        ];

        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $wemaService = FsiEngine::WemaProvider()->CreateMerchant;
        $response = $wemaService->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }

}