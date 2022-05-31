<?php

require 'vendor/autoload.php';


use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

$routeParam = [
    "businessId" => "3"
];

$formData = [
    'businessId' => 3
];
$header = [
    "ocp-apim-subscription-key" => "my_key_here_1234"
];

FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
$baxiService = FsiEngine::WemaProvider()->UpdateBusiness;
$response = $baxiService->send($formData, $header, $routeParam);
print($response);