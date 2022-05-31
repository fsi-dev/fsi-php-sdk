<?php


namespace ProvidersTests\Baxipay;


use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class MultiChoiceRequestTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "service_type" => "dstv",
            "smartcard_number" => 1122334455,
            "total_amount" => 4200,
            "product_code" => "ACSSE36",
            "product_monthsPaidFor" => "1",
            "addon_code" => "HDPVRE36",
            "addon_monthsPaidFor" => "1",
            "agentId" => 207,
            "agentReference" => "AX14s68P2Z"
        ];

        $header = [
            "x-api-key" => "5adea9-044a85-708016-7ae662-646d59"
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $baxiService = FsiEngine::BaxiProvider()->MultiChoiceRequest;
        $response = $baxiService->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }
}