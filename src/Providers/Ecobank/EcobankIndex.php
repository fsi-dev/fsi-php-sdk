<?php

namespace FsiEngine\Providers\Ecobank;

use FsiEngine\Constants\Meta;
use FsiEngine\Providers\Support\ProviderInterface;

class EcobankIndex implements ProviderInterface
{
    /**
     * @var $apiKey
     * @var $environmentURL
     * @var $providerBaseURL
     * @var $defaultArrayObject
     */
    protected $apiKey;
    protected $environmentURL;
    public static $defaultArrayObject   = [];

    protected $tokenGeneration, $cardPayment, $momoPayment, $merchantCategoryCode, $merchantQrCreation;
    /**
     * @param $apiKey
     * @param string $environmentURL
     */
    public function  __construct($apiKey, $environmentURL = Meta::SANDBOX_URL) {
        $this->apiKey                       = $apiKey;
        $this->environmentURL               = $environmentURL;
        $this->tokenGeneration              = new TokenGeneration($this->apiKey, $this->environmentURL);
        $this->cardPayment                  = new CardPayment($this->apiKey, $this->environmentURL);
        $this->momoPayment                  = new MomoPayment($this->apiKey, $this->environmentURL);
        $this->merchantCategoryCode         = new MerchantCategoryCode($this->apiKey, $this->environmentURL);
        $this->merchantQrCreation           = new MerchantQrCreation($this->apiKey, $this->environmentURL);
    }

    /**====================
     * @return object
     */
    public function providerServices() {
        $resultObject                                   = (object)self::$defaultArrayObject; //All services will come into this object
        $resultObject->TokenGeneration                  = $this->tokenGeneration;
        $resultObject->CardPayment                      = $this->cardPayment;
        $resultObject->MomoPayment                      = $this->momoPayment;
        $resultObject->MerchantCategoryCode             = $this->merchantCategoryCode;
        $resultObject->MerchantQrCreation               = $this->merchantQrCreation;
        return $resultObject;

    }


}