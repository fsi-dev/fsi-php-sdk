<?php


namespace ProvidersTests\Baxipay;


use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class PurchaseDatabundleTest extends \PHPUnit\Framework\TestCase
{

    public function testAdd() {
        $formData = [
            "phone" => "07082633522",
            "amount" => 200,
            "service_type" => "mtn",
            "datacode" => "prepaid",
            "agentId" => 207,
            "agentReference" => "AX14s68P2Z"
        ];

        $header = [
            "x-api-key" => "5adea9-044a85-708016-7ae662-646d59"
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $baxiService = FsiEngine::BaxiProvider()->PurchaseDatabundle;
        $response = $baxiService->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }

}