<?php

namespace FsiEngine\RestAPIHelper;

use FsiEngine\Constants\Meta;
use FsiEngine\ResponseHandlers;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use phpDocumentor\Reflection\Types\Array_;


class RestAPIHelper
{

    /**
     * @var $api_key | null
     * @var $environmentURL | null
     * @var $client
     */
    protected $api_key = null;
    protected $environmentURL = null;
    public $client;

    /**
     * @param $api_key
     * @param string $environmentURL
     */
    public function __construct($api_key, $environmentURL = Meta::SANDBOX_URL) {
        $this->environmentURL = $environmentURL;
        $this->api_key = $api_key;
        $this->client = new Client([
            'base_uri' => $this->environmentURL,
        ]);
    }

    /**
     * @param array $formQuery
     * @param $serviceURL
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function GET(array $formQuery, $serviceURL, $additionalHeader = []) : array {

        $client = $this->client;
        $apiKey = $this->api_key;
        $headers = [
            'sandbox-key' => $apiKey,
            'Content-Type' => 'application/json'
        ];
        $headers = array_merge($headers, $additionalHeader);
        try {
            $response = $client->request(Meta::GET_REQUEST, $serviceURL, [
                'query' => $formQuery,
                'headers' => $headers
            ]);
            $body = $response->getBody()->getContents();

            $requestResponse = [
                'status' => true,
                'isError' => false,
                'body' => $body,
                'message' => null
            ];

        }catch (ClientException $e) {

            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            $responseMessage = $e->getMessage();
            $requestResponse =  [
                'status' => false,
                'isError' => true,
                'message' => $responseMessage,
                'responseBody' => $responseBodyAsString
            ];
        }

        return (array)$requestResponse;

    }

    /**
     * @param array $formData
     * @param $serviceURL
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function POST(array $formData, $serviceURL, $additionalHeader = []) : array {

        $client = $this->client;
        $apiKey = $this->api_key;
        $headers = [
            'sandbox-key' => $apiKey,
            'Content-Type' => 'application/json'
        ];
        $headers = array_merge($headers, $additionalHeader);
        try {

            $response = $client->request(Meta::POST_REQUEST, $serviceURL,
                [
                    'body' => json_encode($formData),
                    'headers' => $headers
                ]);
            $body = $response->getBody()->getContents();
            $requestResponse = [
                'status' => true,
                'isError' => false,
                'body' => $body
            ];

        }catch (ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            $requestResponse =  [
                'status' => false,
                'isError' => true,
                'message' => $response,
                'responseBody' => $responseBodyAsString
            ];
        }

        return (array)$requestResponse;

    }

    /**
     * @param array $formData
     * @param $serviceURL
     * @param array $additionalHeader
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function PUT(array $formData, $serviceURL, $additionalHeader = []) : array {
        $client = $this->client;
        $apiKey = $this->api_key;
        $headers = [
            'sandbox-key' => $apiKey,
            'Content-Type' => 'application/json'
        ];
        $headers = array_merge($headers, $additionalHeader);
        try {

            $response = $client->request(Meta::PUT_REQUEST, $serviceURL,
                [
                    'body' => json_encode($formData),
                    'headers' => $headers
                ]);
            $body = $response->getBody()->getContents();
            $requestResponse = [
                'status' => true,
                'isError' => false,
                'body' => $body
            ];

        }catch (ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            $requestResponse =  [
                'status' => false,
                'isError' => true,
                'message' => $response,
                'responseBody' => $responseBodyAsString
            ];
        }

        return (array)$requestResponse;
    }

    /**
     * @param array $formData
     * @param $serviceURL
     * @param array $additionalHeader
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function DELETE(array $formData, $serviceURL, $additionalHeader = []) {

        $client = $this->client;
        $apiKey = $this->api_key;
        $headers = [
            'sandbox-key' => $apiKey,
            'Content-Type' => 'application/json'
        ];
        $headers = array_merge($headers, $additionalHeader);
        try {

            $response = $client->request(Meta::DELETE_REQUEST, $serviceURL,
                [
                    'body' => json_encode($formData),
                    'headers' => $headers
                ]);
            $body = $response->getBody()->getContents();
            $requestResponse = [
                'status' => true,
                'isError' => false,
                'body' => $body
            ];

        }catch (ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            $requestResponse =  [
                'status' => false,
                'isError' => true,
                'message' => $response,
                'responseBody' => $responseBodyAsString
            ];
        }

        return (array)$requestResponse;


    }

    /**
     * @param array $formData
     * @param string $serviceURL
     * @param array $additionalHeader
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function PATCH(array $formData, $serviceURL, $additionalHeader = []) :array {
        $client = $this->client;
        $apiKey = $this->api_key;
        $headers = [
            'sandbox-key' => $apiKey,
            'Content-Type' => 'application/json'
        ];
        $headers = array_merge($headers, $additionalHeader);
        try {

            $response = $client->request(Meta::PATCH_REQUEST, $serviceURL,
                [
                    'body' => json_encode($formData),
                    'headers' => $headers
                ]);
            $body = $response->getBody()->getContents();
            $requestResponse = [
                'status' => true,
                'isError' => false,
                'body' => $body
            ];

        }catch (ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            $requestResponse =  [
                'status' => false,
                'isError' => true,
                'message' => $response,
                'responseBody' => $responseBodyAsString
            ];
        }

        return (array)$requestResponse;
    }

}