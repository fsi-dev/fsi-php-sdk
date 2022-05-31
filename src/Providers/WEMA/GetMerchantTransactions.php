<?php


namespace FsiEngine\Providers\WEMA;


use FsiEngine\Constants\Meta;
use FsiEngine\Providers\Support\PayloadInterface;
use FsiEngine\ResponseHandlers;
use FsiEngine\RestAPIHelper\RestAPIHelper;

class GetMerchantTransactions implements PayloadInterface
{

    protected $apiKey;
    protected $environmentURL;
    public static $providerBaseURL = "api/".Meta::CURRENT_API_VERSION."/wema";

    public function __construct($apiKey, $environmentURL = Meta::SANDBOX_URL)
    {
        $this->apiKey           = $apiKey;
        $this->environmentURL   = $environmentURL;
    }

    public function send(array $formData, array $additionalHeaders = [], array $routeParams = [])
    {

        try{

            if(!array_key_exists("merchantId", $routeParams)){
                return ResponseHandlers::errorResponse("Route Params is required", 400, $formData);

            }

            $restAPIHelper = new RestAPIHelper($this->apiKey, $this->environmentURL);
            $response = $restAPIHelper->GET($formData, self::$providerBaseURL."/alatpay-pc/api/v1/paymentCard/transactions/merchants/".$routeParams['merchantId'], $additionalHeaders);

            if($response['isError']) {
                return ResponseHandlers::errorResponse($response, 400, $formData);
            }

            $body = $response['body'];


        }catch(\Exception $e) {
            return ResponseHandlers::errorResponse("Request Error", 400, $formData, $e);
        }

        return ResponseHandlers::validResponse("Successful Request", \GuzzleHttp\json_decode($body));

    }


}