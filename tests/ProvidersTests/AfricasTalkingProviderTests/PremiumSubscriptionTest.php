<?php

namespace ProvidersTests\AfricasTalkingProviderTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class PremiumSubscriptionTest extends \PHPUnit\Framework\TestCase
{

    public function testAdd() {

        $formData = [
            "username"      => "sandbox",
            "phoneNumber"   => "2349096651299",
            "shortCode"     => "1234",
            "keyword"       => "branding",
            "checkoutToken" => "kallkmalfef8"
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processPremiumSubscriptionProvider = FsiEngine::AfricasTalkingProvider()->PremiumSubscription;
        $response = $processPremiumSubscriptionProvider->send($formData);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);

    }
}