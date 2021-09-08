<?php

namespace FsiEngine\Providers\WovenFinance;

use FsiEngine\Constants\Meta;
use FsiEngine\Providers\Support\PayloadInterface;
use FsiEngine\ResponseHandlers;
use FsiEngine\RestAPIHelper\RestAPIHelper;

class EditVirtualAccount implements PayloadInterface
{
    protected $apiKey;
    protected $environmentURL;
    public static $providerBaseURL = "api/woven";

    public function  __construct($apiKey, $environmentURL = Meta::SANDBOX_URL) {
        $this->apiKey           = $apiKey;
        $this->environmentURL   = $environmentURL;
    }

    /**
     * @param array $formData
     * @return false|string
     */
    public function send(array $formData = [], array $additionalHeaders = []) {

        try {

            try {
                $restAPIHelper = new RestAPIHelper($this->apiKey, $this->environmentURL);
                $response = $restAPIHelper->PUT($formData, self::$providerBaseURL."/vnubans/4001549179", $additionalHeaders);

                if($response['isError']) {
                    return ResponseHandlers::errorResponse($response['responseBody'], 400, $formData);
                }

                $body = $response['body'];

            }catch (\Exception $e) {
                return ResponseHandlers::errorResponse("Request Error", 400, $formData, $e);
            }
            return ResponseHandlers::validResponse("Successful Request", \GuzzleHttp\json_decode($body));

        }catch(\Exception $e) {
            return ResponseHandlers::errorResponse("Error", 500, $formData, $e);
        }

    }
}