<?php

namespace FsiEngine\Providers\WovenFinance;

use FsiEngine\Constants\Meta;
use FsiEngine\Providers\Support\ProviderInterface;

class WovenFinanceIndex implements ProviderInterface
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
    protected $createVirtualAccount, $createExistingCustomerVirtualAccount, $listVirtualAccounts,
        $lookupVirtualAccount, $editVirtualAccount, $vNUBANTransactions, $listTransactions, $fetchTransaction;
    /**==================================
     * @param $apiKey
     * @param string $environmentURL
     */
    public function  __construct($apiKey, $environmentURL = Meta::SANDBOX_URL)
    {
        $this->apiKey                                   = $apiKey;
        $this->environmentURL                           = $environmentURL;
        $this->createVirtualAccount                     = new CreateVirtualAccount($this->apiKey, $this->environmentURL);
        $this->createExistingCustomerVirtualAccount     = new CreateExistingCustomerVirtualAccount($this->apiKey, $this->environmentURL);
        $this->listVirtualAccounts                      = new ListVirtualAccounts($this->apiKey, $this->environmentURL);
        $this->lookupVirtualAccount                     = new LookupVirtualAccount($this->apiKey, $this->environmentURL);
        $this->editVirtualAccount                       = new EditVirtualAccount($this->apiKey, $this->environmentURL);
        $this->vNUBANTransactions                       = new vNUBANTransactions($this->apiKey, $this->environmentURL);
        $this->listTransactions                         = new ListTransactions($this->apiKey, $this->environmentURL);
        $this->fetchTransaction                         = $this->listTransactions;

    }

    /**==========================
     * @return object
     */
    public function providerServices() {
        $resultObject                                           = (object)self::$defaultArrayObject; //All services will come into this object
        $resultObject->CreateVirtualAccount                     = $this->createVirtualAccount;
        $resultObject->CreateExistingCustomerVirtualAccount     = $this->createExistingCustomerVirtualAccount;
        $resultObject->ListVirtualAccounts                      = $this->listVirtualAccounts;
        $resultObject->LookupVirtualAccount                     = $this->lookupVirtualAccount;
        $resultObject->EditVirtualAccount                       = $this->editVirtualAccount;
        $resultObject->vNUBANTransactions                       = $this->vNUBANTransactions;
        $resultObject->ListTransactions                         = $this->listTransactions;
        $resultObject->FetchTransaction                         = $this->fetchTransaction;
        return $resultObject;
    }
}