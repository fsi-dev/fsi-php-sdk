<?php

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;


class PaymentCardAPITest extends \PHPUnit\Framework\TestCase
{

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
    }

    public function testGetSettlementRecord() {
        $formData = [
            'Page' => 3,
            "Limit" => 2,
            "filter" => "all"
        ];
        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];

        $service = FsiEngine::WemaProvider()->GetSettlementRecord;
        $response = $service->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }

    public function hud() {

    }
    public function testPerformBulkSettlementAction() {
        $formData = [

        ];
        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];

        $service = FsiEngine::WemaProvider()->PerformBulkSettlementAction;
        $response = $service->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }

    public function testInitializeCardPayment() {
        $formData = [
            "cardNumber" => "5123450000000008",
            "orderId" => "2"
        ];

        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];

        $service = FsiEngine::WemaProvider()->InitializeCardPayment;
        $response = $service->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }

    public function testGetTransactionDetails() {
        $routeParams = [
            "transactionId" => '2'
        ];

        $formData = [
            "transactionId" => "2"
        ];

        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];

        $service = FsiEngine::WemaProvider()->GetTransactionDetails;
        $response = $service->send($formData, $header, $routeParams);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }
    public function testGetMerchantTransactions() {
        $routeParams = [
            "merchantId" => '2'
        ];

        $formData = [
            "merchantId" => "2"
        ];

        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];

        $service = FsiEngine::WemaProvider()->GetMerchantTransactions;
        $response = $service->send($formData, $header, $routeParams);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }

    public function testCardPaymentAuthentication() {
        $formData = [
            "cardNumber" => "5123450000000008",
            "cardMonth" => "1",
            "cardYear" => "39",
            "securityCode" => "100",
            "amount" => 1000,
            "currency" => "NGN",
            "transactionId" => "string",
            "description" => "ALATpay Checkout Payment",
            "businessId" => "string",
            "businessName" => "JohnJoe Store",
            "orderId" => "string",
            "customer" => [
                "email" => "",
                "phone" => "",
                "firstName" => "",
                "lastName" => "",
                "metadata" => ""
            ]
        ];
        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];

        $service = FsiEngine::WemaProvider()->AuthenticateCardPayment;
        $response = $service->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }

    public function testListenToTransaction() {
        $formData = [
            "transactionId" => "1"
        ];

        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];

        $service = FsiEngine::WemaProvider()->ListenToATransaction;
        $response = $service->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }

    public function testAuthenticateCallback() {
        $formData = [

        ];

        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];

        $service = FsiEngine::WemaProvider()->AuthenticateCallback;
        $response = $service->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }

    public function testGetAllBills() {
        $formData = [

        ];

        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];

        $service = FsiEngine::WemaProvider()->GetAllBills;
        $response = $service->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }

    public function testValidateCustomer() {
        $formData = [
            "channelId" => "string",
            "identifier" => "string",
            "packageId" => 0
        ];

        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];

        $service = FsiEngine::WemaProvider()->ValidateCustomer;
        $response = $service->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }

    public function testPayBill() {
        $formData = [
            "customerAccount" => "string",
            "amount" => 0,
            "charge" => 0,
            "transactionReference" => "string",
            "packageId" => 0,
            "customerIdentifier" => "string",
            "customerEmail" => "string",
            "customerPhoneNumber" => "string",
            "customerName" => "string"
        ];

        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];

        $service = FsiEngine::WemaProvider()->PayBill;
        $response = $service->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }





}