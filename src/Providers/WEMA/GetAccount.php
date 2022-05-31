<?php


namespace FsiEngine\Providers\WEMA;


use FsiEngine\Constants\Meta;
use FsiEngine\Providers\Support\PayloadInterface;
use FsiEngine\ResponseHandlers;
use FsiEngine\RestAPIHelper\RestAPIHelper;
use GuzzleHttp\Exception\GuzzleException;

class GetAccount implements PayloadInterface
{

    protected $apiKey;
    protected $environmentURL;
    public static $providerBaseURL = "api/".Meta::CURRENT_API_VERSION."/wema";

    /**
     * Categories constructor.
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
     * @return mixed
     * @throws GuzzleException
     */
    public function send(array $formData, array $additionalHeaders = [], array $routeParams = [])
    {
        try {
            if(!array_key_exists("accountNumber", $routeParams)){
                return ResponseHandlers::errorResponse("Route Params is required", 400, $formData);

            }
            $url = self::$providerBaseURL."/account-maintenance/api/AccountMaintenance/CustomerAccount/GetAccountV2/accountNumber/".$routeParams['accountNumber'];
            $restAPIHelper = new RestAPIHelper($this->apiKey, $this->environmentURL);
            $response = $restAPIHelper->GET($formData, $url, $additionalHeaders);

            if($response['isError']) {
                return ResponseHandlers::errorResponse($response, 400, $formData);
            }

            $body = $response['body'];

        }catch (\Exception $e) {
            return ResponseHandlers::errorResponse("Request Error", 400, $formData, $e);
        }

        return ResponseHandlers::validResponse("Successful Request", \GuzzleHttp\json_decode($body));

    }


}