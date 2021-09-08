<?php

namespace FsiEngine\Providers\AfricasTalkingProvider;
use FsiEngine\Constants\Meta;
use FsiEngine\Providers\Support\ProviderInterface;

class AfricasTalkingIndex implements ProviderInterface
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
    protected $sendSMS, $airtime, $fetchMessage, $premiumSubscription, $fetchPremiumSubscription, $deletePremium,
        $transactionStatus, $voiceCall, $queueStatus, $mediaUpload;


    /**
     * @param $apiKey
     * @param string $environmentURL
     */
    public function  __construct($apiKey, $environmentURL = Meta::SANDBOX_URL) {
        $this->apiKey                       = $apiKey;
        $this->environmentURL               = $environmentURL;
        $this->sendSMS                      = new SendSMS($this->apiKey, $this->environmentURL);
        $this->airtime                      = new Airtime($this->apiKey, $this->environmentURL);
        $this->fetchMessage                 = new FetchMessage($this->apiKey, $this->environmentURL);
        $this->premiumSubscription          = new PremiumSubscription($this->apiKey, $this->environmentURL);
        $this->fetchPremiumSubscription     = new FetchPremiumSubscription($this->apiKey, $this->environmentURL);
        $this->deletePremium                = new DeletePremium($this->apiKey, $this->environmentURL);
        $this->transactionStatus            = new TransactionStatus($this->apiKey, $this->environmentURL);
        $this->voiceCall                    = new VoiceCall($this->apiKey, $this->environmentURL);
        $this->queueStatus                  = new QueueStatus($this->apiKey, $this->environmentURL);
        $this->mediaUpload                  = new MediaUpload($this->apiKey, $this->environmentURL);

    }

    /**====================
     * @return object
     */
    public function providerServices() {
        $resultObject                                   = (object)self::$defaultArrayObject; //All services will come into this object
        $resultObject->Sms                              = $this->sendSMS;
        $resultObject->Airtime                          = $this->airtime;
        $resultObject->Message                          = $this->fetchMessage;
        $resultObject->PremiumSubscription              = $this->premiumSubscription;
        $resultObject->FetchPremiumSubscription         = $this->fetchPremiumSubscription;
        $resultObject->DeletePremium                    = $this->deletePremium;
        $resultObject->TransactionStatus                = $this->transactionStatus;
        $resultObject->VoiceCall                        = $this->voiceCall;
        $resultObject->QueueStatus                      = $this->queueStatus;
        $resultObject->MediaUpload                      = $this->mediaUpload;
        return (object)$resultObject;
    }


}