<?php

namespace ProvidersTests\FCMBProviderTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class B2BTransfersTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "nameEnquiryRef"                    => "999214190218121217000001177403",
            "destinationInstitutionCode"        => "999063",
            "channelCode"                       => "2",
            "beneficiaryAccountNumber"          => "0000000000",
            "beneficiaryAccountName"            => "OBIOHA O. GODDY",
            "beneficiaryBankVerificationNumber" => "1",
            "beneficiaryKYCLevel"               => "3",
            "originatorAccountName"             => "OKUBOTE IDOWU OLUWAKEMI",
            "originatorAccountNumber"           => "0000000002",
            "transactionNarration"              => "Transfer ifo OKUBOTE",
            "paymentReference"                  => "12345",
            "amount"                            => "100.1",
            "traceId"                           => "12345",
            "chargeAmount"                      => "52.59",
            "platformType"                      => "ESB"
        ];

        $header = [ // Additional Headers...
            'x-ibm-client-id'           => 'f',
            'Accept'                    => 'application/json'
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processB2BTransferProvider = FsiEngine::FCMBProvider()->B2BTransfers;
        $response = $processB2BTransferProvider->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);


    }
}