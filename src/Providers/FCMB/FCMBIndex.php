<?php

namespace FsiEngine\Providers\FCMB;

use FsiEngine\Constants\Meta;
use FsiEngine\Providers\Support\ProviderInterface;

class FCMBIndex implements ProviderInterface
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
    protected $b2bTransfers, $b2bInternalTransfers, $internalTransfers, $internalTransferDaterange,
        $internalTransferStatus, $nipTransfers, $nipTransfersDaterange, $nipCharge, $nipBanks, $nipName,
        $nipStatus, $validateCustomerID, $lastFourDigits, $atmPin, $cardType, $cardRequest,
        $customerWalletBalance, $customerWalletNew, $customerWalletStatus, $validateCode;


    /**
     * @param $apiKey
     * @param string $environmentURL
     */
    public function  __construct($apiKey, $environmentURL = Meta::SANDBOX_URL) {
        $this->apiKey                       = $apiKey;
        $this->environmentURL               = $environmentURL;
        $this->b2bTransfers                 = new B2BTransfers($this->apiKey, $this->environmentURL);
        $this->b2bInternalTransfers         = new B2BInternalTranfers($this->apiKey, $this->environmentURL);
        $this->internalTransfers            = new InternalTransfers($this->apiKey, $this->environmentURL);
        $this->internalTransferDaterange    = new InternalTransferDaterange($this->apiKey, $this->environmentURL);
        $this->internalTransferStatus       = new InternalTransferStatus($this->apiKey, $this->environmentURL);
        $this->nipTransfers                 = new NIPTransfers($this->apiKey, $this->environmentURL);
        $this->nipTransfersDaterange        = new NIPTransfersDaterange($this->apiKey, $this->environmentURL);
        $this->nipCharge                    = new NIPCharge($this->apiKey, $this->environmentURL);
        $this->nipBanks                     = new NIPBanks($this->apiKey, $this->environmentURL);
        $this->nipName                      = new NIPName($this->apiKey, $this->environmentURL);
        $this->nipStatus                    = new NIPStatus($this->apiKey, $this->environmentURL);
        $this->validateCustomerID           = new ValidateCustomerID($this->apiKey, $this->environmentURL);
        $this->lastFourDigits               = new LastFourDigits($this->apiKey, $this->environmentURL);
        $this->atmPin                       = new ATMPin($this->apiKey, $this->environmentURL);
        $this->cardType                     = new CardType($this->apiKey, $this->environmentURL);
        $this->cardRequest                  = new CardRequest($this->apiKey, $this->environmentURL);
        $this->customerWalletBalance        = new CustomerWalletBalance($this->apiKey, $this->environmentURL);
        $this->customerWalletNew            = new CustomerWalletNew($this->apiKey, $this->environmentURL);
        $this->customerWalletStatus         = new CustomerWalletStatus($this->apiKey, $this->environmentURL);
        $this->validateCode                 = new ValidateCode($this->apiKey, $this->environmentURL);


    }
    /**====================
     * @return object
     */
    public function providerServices() {
        $resultObject                                   = (object)self::$defaultArrayObject; //All services will come into this object
        $resultObject->B2BTransfers                     = $this->b2bTransfers;
        $resultObject->B2BInternalTransfers             = $this->b2bInternalTransfers;
        $resultObject->InternalTransfers                = $this->internalTransfers;
        $resultObject->InternalTransferDaterange        = $this->internalTransferDaterange;
        $resultObject->InternalTransferStatus           = $this->internalTransferStatus;
        $resultObject->NIPTransfers                     = $this->nipTransfers;
        $resultObject->NIPTransfersDaterange            = $this->nipTransfersDaterange;
        $resultObject->NIPCharge                        = $this->nipCharge;
        $resultObject->NIPBanks                         = $this->nipBanks;
        $resultObject->NIPName                          = $this->nipName;
        $resultObject->NIPStatus                        = $this->nipStatus;
        $resultObject->ValidateCustomerID               = $this->validateCustomerID;
        $resultObject->LastFourDigits                   = $this->lastFourDigits;
        $resultObject->ATMPin                           = $this->atmPin;
        $resultObject->CardType                         = $this->cardType;
        $resultObject->CardRequest                      = $this->cardRequest;
        $resultObject->CustomerWalletBalance            = $this->customerWalletBalance;
        $resultObject->CustomerWalletNew                = $this->customerWalletNew;
        $resultObject->CustomerWalletStatus             = $this->customerWalletStatus;
        $resultObject->ValidateCode                     = $this->validateCode;
        return $resultObject;
    }

}