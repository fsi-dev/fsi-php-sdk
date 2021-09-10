<?php

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

require "vendor/autoload.php";

$formData = [
    "username"  => "sandbox",
    "to"        => "+2348120534617",
    "message"   => "up town girl"
];

FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
$processSMSProvider = FsiEngine::AfricasTalkingProvider()->Sms;
$response = $processSMSProvider->send($formData);
print($response);