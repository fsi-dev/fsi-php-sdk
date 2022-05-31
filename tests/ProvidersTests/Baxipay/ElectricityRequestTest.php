<?php


namespace ProvidersTests\Baxipay;


use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class ElectricityRequestTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {
        $formData = [
            "service_type" => "ikeja_electric_prepaid",
            "account_number" => "04042404048",
            "amount" => 2000,
            "phone" => "08012345678",
            "agentId" => 205,
            "agentReference" => "ASF33309d458"
        ];

        $header = [
            "x-api-key" => "5adea9-044a85-708016-7ae662-646d59"
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $baxiService = FsiEngine::BaxiProvider()->ElectricityRequest;
        $response = $baxiService->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }

}