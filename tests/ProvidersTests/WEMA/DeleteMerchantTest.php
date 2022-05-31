<?php
use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class DeleteMerchantTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $routeParam = [
            "merchantId" => "2"
        ];

        $formData = [
            "merchantId" => "2"
        ];

        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $wemaService = FsiEngine::WemaProvider()->DeleteMerchant;
        $response = $wemaService->send($formData, $header, $routeParam);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }




}