<?php


namespace FsiEngine\Providers\WEMA;


use FsiEngine\Constants\Meta;
use FsiEngine\Providers\Support\PayloadInterface;
use FsiEngine\ResponseHandlers;
use FsiEngine\RestAPIHelper\RestAPIHelper;

class GetMerchantBusinesses implements PayloadInterface
{

    protected $apiKey;
    protected $environmentURL;
    public static $providerBaseURL = "api/".Meta::CURRENT_API_VERSION."/wema";

    /**
     * GetMerchantBusinesses constructor.
     * @param $apiKey
     * @param string $environmentURL
     */
    public function __construct($apiKey, $environmentURL = Meta::SANDBOX_URL)
    {
        $this->apiKey           = $apiKey;
        $this->environmentURL   = $environmentURL;
    }

    /**
     * @param array $formData
     * @param array $additionalHeaders
     * @param array $routeParams
     * @return false|mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send(array $formData, array $additionalHeaders = [], array $routeParams = []) {

        try{
            if(!array_key_exists("merchantId", $routeParams)){
                return ResponseHandlers::errorResponse("Route Params is required", 400, $formData);
            }
            $restAPIHelper = new RestAPIHelper($this->apiKey, $this->environmentURL);
            $response = $restAPIHelper->GET($formData, self::$providerBaseURL."/alatpay-mo/api/v1/merchants/".$routeParams['merchantId']."/businesses", $additionalHeaders);

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