<?php

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;


class GetBusinessInformationTest extends \PHPUnit\Framework\TestCase
{

    public function testAdd() {
        $routeParam = [
            "businessId" => "509348343434"
        ];
        $formData = [
            "businessId" => "509348343434"
        ];

        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $wemaService = FsiEngine::WemaProvider()->GetBusinessInformation;
        $response = $wemaService->send($formData, $header, $routeParam);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }
    public function testGetMerchantsInformation() {
        $routeParam = [
            "merchantId" => "3"
        ];
        $formData = [
            "merchantId" => "3"
        ];

        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $wemaService = FsiEngine::WemaProvider()->GetMerchantInformation;
        $response = $wemaService->send($formData, $header, $routeParam);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }

    public function testMerchantBusinesses() {
        $routeParam = [
            "merchantId" => "3"
        ];
        $formData = [
            "merchantId" => "3"
        ];

        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $wemaService = FsiEngine::WemaProvider()->MerchantBusinesses;
        $response = $wemaService->send($formData, $header, $routeParam);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }
}