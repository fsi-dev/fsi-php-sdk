<?php

use FsiEngine\Constants\Meta;
use FsiEngine\SDK\FsiEngine;

class CrowdfundingOnbordingAPITests extends \PHPUnit\Framework\TestCase
{

    public function __construct()
    {
        FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
    }

    public function testAuthenticateUsr() {
        $formData = [
            'email' => "blessing@initsng.com",
            "password" => "password",
        ];
        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];

        $service = FsiEngine::WemaProvider()->AuthenticateUser;
        $response = $service->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }

    public function testChangePassword() {
        $formData = [
            'current_password' => "password",
            "new_password" => "password",
            "confirm_password" => "password",
        ];
        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];
        $service = FsiEngine::WemaProvider()->ChangePassword;
        $response = $service->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }



    public function testConfirmEmailChange() {
        $formData = [
            'new_email' => "string",
            "old_email" => "string",
            "code" => "string"
        ];
        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];
        $service = FsiEngine::WemaProvider()->ConfirmEmailChange;
        $response = $service->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }

    public function testVerifyUsername() {
        $formData = [
            'username' => "string"
        ];
        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];
        $service = FsiEngine::WemaProvider()->VerifyUsername;
        $response = $service->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }


    public function testVerifyEmail() {
        $formData = [
            'email' => "string"
        ];
        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];
        $service = FsiEngine::WemaProvider()->VerifyEmail;
        $response = $service->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }

    public function testConfirmUserEmail() {
        $formData = [
            'email' => "string",
            "code" => "string"
        ];
        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];
        $service = FsiEngine::WemaProvider()->ConfirmUserEmail;
        $response = $service->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }

    public function testEditCorporate() {
        $routeParam = [
            "id" => "1"
        ];
        $formData = [
            'id' => "1",
        ];
        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];
        $service = FsiEngine::WemaProvider()->EditCorporate;
        $response = $service->send($formData, $header, $routeParam);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }

    public function testGenerateChangeEmailToken() {
        $formData = [
            'password' => "string",
            "new_email" => "string",
            "confirm_email" => 'string'
        ];
        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];
        $service = FsiEngine::WemaProvider()->GenerateChangeEmailToken;
        $response = $service->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }

    public function testGeneratePasswordResetCode() {
        $formData = [
            'email' => "string"
        ];
        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];
        $service = FsiEngine::WemaProvider()->GenerateChangeEmailToken;
        $response = $service->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }

    public function testGetcorporateDetails() {
        $routeParams = [
            "id" => 1
        ];
        $formData = [
            'id' => 1
        ];
        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];
        $service = FsiEngine::WemaProvider()->GetCorporateDetails;
        $response = $service->send($formData, $header, $routeParams);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }
    public function testGetUserAccountProfile() {
        $formData = [
        ];
        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];
        $service = FsiEngine::WemaProvider()->GetUserAccountProfile;
        $response = $service->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }
    public function testGetUserAccountDetails() {
        $formData = [
        ];
        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];
        $service = FsiEngine::WemaProvider()->GetUserAccountDetails;
        $response = $service->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }
    public function testGetWemaAccountDetails() {
        $formData = [
            'account_number' => '003948855'
        ];
        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];
        $service = FsiEngine::WemaProvider()->GetWemaAccountDetails;
        $response = $service->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }


    public function testGetWemaCorporateAccountDetails() {
        $formData = [
        ];
        $header = [
            "ocp-apim-subscription-key" => "my_key_here_1234"
        ];
        $service = FsiEngine::WemaProvider()->GetWemaCorporateAccountDetails;
        $response = $service->send($formData, $header);
        $decodeResponse = json_decode($response);
        if(isset($decodeResponse->status_code) && $decodeResponse->status_code === 200) {
            $response = (int)$decodeResponse->status_code;
        }

        $this->assertEquals(200, $response);
    }





}