<?php


namespace FsiEngine\Providers\WEMA;


use FsiEngine\Constants\Meta;
use FsiEngine\Providers\Support\PayloadInterface;
use FsiEngine\ResponseHandlers;
use FsiEngine\RestAPIHelper\RestAPIHelper;

class ValidateCustomer implements PayloadInterface
{


    protected $apiKey;
    protected $environmentURL;
    public static $providerBaseURL = "api/".Meta::CURRENT_API_VERSION."/wema";

    /**
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
     * @return false|mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send(array $formData, array $additionalHeaders = [])
    {
        try{

            $restAPIHelper = new RestAPIHelper($this->apiKey, $this->environmentURL);
            $response = $restAPIHelper->POST($formData, self::$providerBaseURL."/open-bills/api/OpenApiBills/ValidateCustomer", $additionalHeaders);

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