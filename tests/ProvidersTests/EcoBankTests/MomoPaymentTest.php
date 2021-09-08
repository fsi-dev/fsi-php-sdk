<?php

namespace ProvidersTests\EcoBankTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngineSDK;

class MomoPaymentTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "affiliateCode"     => "EGH",
            "telco"             => "MTN",
            "channel"           => "UNIFIED",
            "token"             => "SBRC/3MJMGmz1WuHiRpmikk6SWgBj/Tt",
            "content"           => [
                "countryCode"           => "GH",
                "transId"               => "1ER9P00OT",
                "productCode"           => "1132",
                "senderName"            => "ben",
                "senderAccountNo"       => "233242006671",
                "senderPhoneNumber"     => "233242006671",
                "branch"                => "001",
                "transRef"              => "REF671700057",
                "bankref"               => "REF6798238",
                "receiverPhoneNumber"   => "0244296442",
                "receiverFirstName"     => "Kojo",
                "receiverLastName"      => "Funds",
                "receiverEmail"         => "",
                "receiverBank"          => "6762482201037786",
                "currency"              => "GHS",
                "amount"                => "0.01",
                "transDesc"             => "Wallet Trans",
                "transType"             => "pull"
            ],
            "secureHash" => "7f137705f4caa39dd691e771403430dd23d27aa53cefcb97217927312e77847bca6b8764f487ce5d1f6520fd7227e4d4c470c5d1e7455822c8ee95b10a0e9855"
        ];

        $header = [ // Additional Headers...
            'origin'                    => 'developer.ecobank.com',
            'Accept'                    => 'application/json',
            'Authorization'             => 'Bearer 85dc50e24f6f36850f48390be3516c518acdc427c5c5113334c'
        ];

        $fsiEngineSDK = new FsiEngineSDK(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processMomoPaymentProvider = $fsiEngineSDK->processEcobankProvider()->MomoPayment;
        $response = $processMomoPaymentProvider->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);

    }
}