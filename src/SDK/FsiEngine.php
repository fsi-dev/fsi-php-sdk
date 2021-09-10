<?php
namespace FsiEngine\SDK;
use \FsiEngine\Constants\Meta;
use FsiEngine\Providers\AfricasTalkingProvider\AfricasTalkingIndex;
use FsiEngine\Providers\Ecobank\EcobankIndex;
use FsiEngine\Providers\FCMB\FCMBIndex;
use FsiEngine\Providers\SterlingBankProvider\SterlingBankIndex;
use FsiEngine\Providers\WovenFinance\WovenFinanceIndex;

class FsiEngine
{

    /**
     * @var $api_key | null
     * @var $developmentType
     * @var $developmentURL
     */
    protected static $api_key;
    protected static $developmentType;
    protected static $developmentURL;

    /**
     * @param $apiKey
     * @param $deploymentType
     * @param string $developmentURL
     */
    public static function init($apiKey, $deploymentType, $developmentURL = Meta::SANDBOX_URL) {
        self::$api_key = $apiKey;
        self::$developmentType = $deploymentType;
        self::$developmentURL = $developmentURL;

        if(self::$developmentType === Meta::LIVE_DEPLOYMENT_TYPE){
            self::$developmentURL = Meta::LIVE_BASE_URL;
        }

    }

    /**
     * =====================
     * @return object
     */
    public static function AfricasTalkingProvider() {
        $provider =  new AfricasTalkingIndex(self::$api_key, self::$developmentURL);
        return $provider->providerServices();
    }

    /**
     * =====================
     * @return object
     */
    public static function SterlingBankProvider() {
        $provider = new SterlingBankIndex(self::$api_key, self::$developmentURL);
        return $provider->providerServices();
    }

    /**
     * =====================
     * @return object
     */
    public static function FCMBProvider() {
        $provider = new FCMBIndex(self::$api_key, self::$developmentURL);
        return $provider->providerServices();
    }

    /**
     * =====================
     * @return object
     */
    public static function EcobankProvider() {
        $provider = new EcobankIndex(self::$api_key, self::$developmentURL);
        return $provider->providerServices();
    }

    /**
     * ====================
     * @return object
     */
    public static function WovenFinanceProvider()
    {
        $provider = new WovenFinanceIndex(self::$api_key, self::$developmentURL);
        return $provider->providerServices();
    }

    //...You can have other providers too here...

}