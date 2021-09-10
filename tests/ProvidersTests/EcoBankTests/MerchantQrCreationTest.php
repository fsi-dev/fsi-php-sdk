<?php

namespace ProvidersTests\EcoBankTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class MerchantQrCreationTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "headerRequest" => [
                "requestId"              => "",
                "affiliateCode"         => "EGH",
                "requestToken"          => "/4mZF42iofzo7BDu0YtbwY6swLwk46Z91xItybhYwQGFpaZNOpsznL/9fca5LkeV",
                "sourceCode"            => "ECOBANK_QR_API",
                "sourceChannelId"       => "KANZAN",
                "requestType"           =>"CREATE_MERCHANT"
            ],
            "merchantAddress"           => "123ERT",
            "merchantName"              =>"UNIFIED SHOPPING CENTER",
            "accountNumber"             => "02002233444",
            "terminalName"              => "UNIFIED KIDS SHOPPING ARCADE",
            "mobileNumber"              => "0245293945",
            "email"                     => "freemanst@gmail.com",
            "area"                      => "Ridge",
            "city"                      => "Ridge",
            "referralCode"              => "123456",
            "mcc"                       => "0000",
            "dynamicQr"                 => "Y",
            "callBackUrl"               => "http://koala.php",
            "secure_hash"               => "7f137705f4caa39dd691e771403430dd23d27aa53cefcb97217927312e77847bca6b8764f487ce5d1f6520fd7227e4d4c470c5d1e7455822c8ee95b10a0e9855"
        ];

        $header = [ // Additional Headers...
            'origin'                    => 'developer.ecobank.com',
            'Accept'                    => 'application/json',
            'Authorization'             => 'Bearer 85dc50e24f6f36850f48390be3516c518acdc427c5c5113334c'
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processMerchantQrCreationProvider = FsiEngine::EcobankProvider()->MerchantQrCreation;
        $response = $processMerchantQrCreationProvider->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);

    }
}