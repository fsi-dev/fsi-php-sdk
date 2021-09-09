<?php
namespace FsiEngine\SDK;
use \FsiEngine\Constants\Meta;
use FsiEngine\Providers\AfricasTalkingProvider\AfricasTalkingIndex;
use FsiEngine\Providers\Ecobank\EcobankIndex;
use FsiEngine\Providers\FCMB\FCMBIndex;
use FsiEngine\Providers\SterlingBankProvider\SterlingBankIndex;
use FsiEngine\Providers\WovenFinance\WovenFinanceIndex;

class FsiEngineSDK
{

    /**
     * @var $api_key | null
     * @var $developmentType
     * @var $developmentURL
     */
    protected $api_key;
    protected $developmentType;
    protected $developmentURL;

    /**
     * @param null $api_key
     * @param string $deployment_type
     */
    public function __construct($api_key, $developmentType, $developmentURL = Meta::SANDBOX_URL){ //set live as default...
        $this->api_key = $api_key;
        $this->developmentType = $developmentType;
        $this->developmentURL = $developmentURL;
        if($developmentType === Meta::TESTING_DEPLOYMENT_TYPE){
            $this->developmentURL = Meta::LIVE_BASE_URL;
        }
    }

    /**
     * =====================
     * @return object
     */
    public function processAfricasTalkingProvider() {
        $provider =  new AfricasTalkingIndex($this->api_key, $this->developmentURL);
        return $provider->providerServices();
    }

    /**
     * =====================
     * @return object
     */
    public function processSterlingBankProvider() {
        $provider = new SterlingBankIndex($this->api_key, $this->developmentURL);
        return $provider->providerServices();
    }

    /**
     * =====================
     * @return object
     */
    public function processFCMBProvider() {
        $provider = new FCMBIndex($this->api_key, $this->developmentURL);
        return $provider->providerServices();
    }

    /**
     * =====================
     * @return object
     */
    public function processEcobankProvider() {
        $provider = new EcobankIndex($this->api_key, $this->developmentURL);
        return $provider->providerServices();
    }

    /**
     * ====================
     * @return object
     */
    public function processWovenFinanceProvider()
    {
        $provider = new WovenFinanceIndex($this->api_key, $this->developmentURL);
        return $provider->providerServices();
    }

    //...You can have other providers too here...

}