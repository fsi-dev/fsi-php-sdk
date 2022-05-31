<?php


namespace FsiEngine\Providers\Baxipay;


use FsiEngine\Constants\Meta;
use FsiEngine\Providers\Support\ProviderInterface;

class BaxipayIndex implements ProviderInterface
{
    protected $apiKey;
    protected $environmentURL;
    public static $defaultArrayObject   = [];
    protected $requery, $getBalance, $refreshServices, $providers, $services, $categories, $servicesCategory,
        $verifyAccountDetails, $purchaseAirtime, $purchaseDatabundle, $providerBundles, $multichoiceLists,
        $multiChoiceRequest, $multiChoiceAddons, $airtimeProviders, $cableTVProviders, $ePinProviders, $ePinBundles,
        $ePinRequest, $electricityBillers, $verifyElectricity, $electricityRequest;

    public function  __construct($apiKey, $environmentURL = Meta::SANDBOX_URL)
    {
        $this->apiKey                       = $apiKey;
        $this->environmentURL               = $environmentURL;
        $this->requery                      = new Requery($this->apiKey, $this->environmentURL);
        $this->getBalance                   = new GetBalance($this->apiKey, $this->environmentURL);
        $this->refreshServices              = new RefreshServices($this->apiKey, $this->environmentURL);
        $this->providers                    = new Providers($this->apiKey, $this->environmentURL);
        $this->services                     = new Services($this->apiKey, $this->environmentURL);
        $this->categories                   = new Categories($this->apiKey, $this->environmentURL);
        $this->servicesCategory             = new ServicesCategory($this->apiKey, $this->environmentURL);
        $this->verifyAccountDetails         = new VerifyAccountDetails($this->apiKey, $this->environmentURL);
        $this->purchaseAirtime              = new PurchaseAirtime($this->apiKey, $this->environmentURL);
        $this->purchaseDatabundle           = new PurchaseDatabundle($this->apiKey, $this->environmentURL);
        $this->providerBundles              = new ProviderBundles($this->apiKey, $this->environmentURL);
        $this->multichoiceLists             = new MultiChoiceLists($this->apiKey, $this->environmentURL);
        $this->multiChoiceRequest           = new MultiChoiceRequest($this->apiKey, $this->environmentURL);
        $this->multiChoiceAddons            = new MultiChoiceAddons($this->apiKey, $this->environmentURL);
        $this->airtimeProviders             = new AirtimeProviders($this->apiKey, $this->environmentURL);
        $this->cableTVProviders             = new CableTVProviders($this->apiKey, $this->environmentURL);
        $this->ePinProviders                = new EPinProviders($this->apiKey, $this->environmentURL);
        $this->ePinBundles                  = new EPinBundles($this->apiKey, $this->environmentURL);
        $this->ePinRequest                  = new EPinRequest($this->apiKey, $this->environmentURL);
        $this->electricityBillers           = new ElectricityBillers($this->apiKey, $this->environmentURL);
        $this->verifyElectricity            = new VerifyElectricity($this->apiKey, $this->environmentURL);
        $this->electricityRequest           = new ElectricityRequest($this->apiKey, $this->environmentURL);

    }

    public function providerServices() {
        $resultObject                                   = (object)self::$defaultArrayObject; // - All services will come into this object
        $resultObject->Requery                          = $this->requery;
        $resultObject->GetBalance                       = $this->getBalance;
        $resultObject->RefreshServices                  = $this->refreshServices;
        $resultObject->Providers                        = $this->providers;
        $resultObject->Services                         = $this->services;
        $resultObject->Categories                       = $this->categories;
        $resultObject->ServicesCategory                 = $this->servicesCategory;
        $resultObject->VerifyAccountDetails             = $this->verifyAccountDetails;
        $resultObject->PurchaseAirtime                  = $this->purchaseAirtime;
        $resultObject->PurchaseDatabundle               = $this->purchaseDatabundle;
        $resultObject->ProviderBundles                  = $this->providerBundles;
        $resultObject->MultiChoiceLists                 = $this->multichoiceLists;
        $resultObject->MultiChoiceRequest               = $this->multiChoiceRequest;
        $resultObject->MultiChoiceAddons                = $this->multiChoiceAddons;
        $resultObject->AirtimeProviders                 = $this->airtimeProviders;
        $resultObject->CableTVProviders                 = $this->cableTVProviders;
        $resultObject->EPinProviders                    = $this->ePinProviders;
        $resultObject->EPinBundles                      = $this->ePinBundles;
        $resultObject->EPinRequest                      = $this->ePinRequest;
        $resultObject->ElectricityBillers               = $this->electricityBillers;
        $resultObject->VerifyElectricity                = $this->verifyElectricity;
        $resultObject->ElectricityRequest               = $this->electricityRequest;


        return (object)$resultObject;


    }
}