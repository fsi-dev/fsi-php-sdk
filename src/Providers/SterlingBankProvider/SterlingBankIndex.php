<?php

namespace FsiEngine\Providers\SterlingBankProvider;

use FsiEngine\Constants\Meta;
use FsiEngine\Providers\Support\ProviderInterface;

class SterlingBankIndex implements ProviderInterface
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
    protected $interbankNameEnquiry, $interbankTransfer, $mobileWallet,
        $getBillersPaymentItems, $getBillersISW;

    /**
     * @param $apiKey
     * @param string $environmentURL
     */
    public function  __construct($apiKey, $environmentURL = Meta::SANDBOX_URL) {
        $this->apiKey                           = $apiKey;
        $this->environmentURL                   = $environmentURL;
        $this->interbankNameEnquiry             = new InterbankNameEnquiry($this->apiKey, $this->environmentURL);
        $this->interbankTransfer                = new InterbankTransfer($this->apiKey, $this->environmentURL);
        $this->mobileWallet                     = new MobileWallet($this->apiKey, $this->environmentURL);
        $this->getBillersPaymentItems           = new GetBillersPaymentItems($this->apiKey, $this->environmentURL);
        $this->getBillersISW                    = new GetBillersISW($this->apiKey, $this->environmentURL);
    }

    /**
     * @return object
     */
    public function providerServices(){
        $resultObject                                   = (object)self::$defaultArrayObject; //All services will come into this object
        $resultObject->InterbankNameEnquiry             = $this->interbankNameEnquiry;
        $resultObject->InterbankTransfer                = $this->interbankTransfer;
        $resultObject->MobileWallet                     = $this->mobileWallet;
        $resultObject->GetBillersPaymentItems           = $this->getBillersPaymentItems;
        $resultObject->GetBillersISW                    = $this->getBillersISW;
        return $resultObject;

    }
}