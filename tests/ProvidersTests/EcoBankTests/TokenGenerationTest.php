<?php

namespace ProvidersTests\EcoBankTests;

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class TokenGenerationTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd() {

        $formData = [
            "userId"        => "developer1@unifiedworks.com",
            "password"      => '$2a$10$Wmame.Lh1FJDCB4JJIxtx.3SZT0dP2XlQWgj9Q5UAGcDLp!@3344'
        ];

        $header = [ // Additional Headers...
            'origin'                    => 'developer.ecobank.com',
            'Accept'                    => 'application/json',
        ];

        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
        $processTokenGenerationProvider = FsiEngine::EcobankProvider()->TokenGeneration;
        $response = $processTokenGenerationProvider->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);

    }
}