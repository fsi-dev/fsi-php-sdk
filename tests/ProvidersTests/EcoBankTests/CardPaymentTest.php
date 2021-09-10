<?php

namespace ProvidersTests\EcoBankTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class CardPaymentTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "paymentDetails" => [
                    "requestId"     => "4466",
                "productCode"       => "GMT112",
                "amount"            => "50035",
                "currency"          => "GBP",
                "locale"            => "en_AU",
                "orderInfo"         => "255s353",
                "returnUrl"         => "https://unifiedcallbacks.com/corporateclbkservice/callback/qr"
            ],
            "merchantDetails" => [
                    "accessCode"     => "79742570",
                "merchantID"         => "ETZ001",
                "secureSecret"       => "sdsffd"
            ],
            "secureHash" => "7f137705f4caa39dd691e771403430dd23d27aa53cefcb97217927312e77847bca6b8764f487ce5d1f6520fd7227e4d4c470c5d1e7455822c8ee95b10a0e9855"
        ];

        $header = [ // Additional Headers...
            'origin'                    => 'developer.ecobank.com',
            'Accept'                    => 'application/json',
            'Authorization'             => 'Bearer 85dc50e24f6f36850f48390be3516c518acdc427c5c5113334c'
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processCardPaymentProvider = FsiEngine::EcobankProvider()->CardPayment;
        $response = $processCardPaymentProvider->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);

    }
}