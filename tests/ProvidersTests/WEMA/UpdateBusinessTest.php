<?php


use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class UpdateBusinessTest extends \PHPUnit\Framework\TestCase
{

    public function testUpdateBusiness() {

        $routeParam = [
            "businessId" => "3"
        ];

        $formData = [
            'businessId' => 3
        ];
        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $baxiService = FsiEngine::WemaProvider()->UpdateBusiness;
        $response = $baxiService->send($formData, $header, $routeParam);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }

    public function testUpdateMerchant() {
        $routeParam = [
            "merchantId" => "3"
        ];

        $formData = [
            'merchantId' => 3
        ];
        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $baxiService = FsiEngine::WemaProvider()->UpdateMerchant;
        $response = $baxiService->send($formData, $header, $routeParam);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }
        $this->assertEquals(200, $response);


    }

}