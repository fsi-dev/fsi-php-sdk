<?php

function dd($query)
{
    echo '<pre>';
    if (is_array($query)) {
        print_r($query);
    } else {
        var_dump($query);
    }
    exit();
}


require_once 'vendor/autoload.php';

use FsiEngine\SDK\FsiEngine;

class OutSideTest
{
    const TESTING_APP_KEY = 'ssfIbylEjxzkPTqbcPGPtEJXs4HKoo7B1629726956';
    const SANDBOX_URL = "https://fsi-core-dev.inits.dev/";
    const LIVE_BASE_URL = "https://fsi-core-dev.inits.dev/";

    public function __construct()
    {
        FsiEngine::init(self::TESTING_APP_KEY, 'testing');
    }

    public function live() {
        $formData = [
            "username"      => "sandbox",
            "recipients"    => [
                [
                    "phoneNumber"   => "+2348120534617",
                    "amount"        => "100"
                ],
                [
                    "phoneNumber"   => "2348120534617",
                    "amount"        => "200"
                ]
            ]
        ];

        FsiEngine::AfricansTalkingProvider()->Sms->send($formData);
    }

}



$c =  new OutSideTest();
$c->live();