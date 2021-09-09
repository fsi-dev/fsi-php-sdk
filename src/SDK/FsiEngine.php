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
     * @param null $api_key
     * @param string $deployment_type
     */
    public function __construct($developmentURL = Meta::SANDBOX_URL)
    { //set live as default...
//        self::api_key = $api_key;

        //double check here to see it app key set

        $this->developmentURL = $developmentURL;
        if (self::$developmentType === Meta::TESTING_DEPLOYMENT_TYPE) {
            $this->developmentURL = Meta::LIVE_BASE_URL;
        }
    }

    public static function init($api, $type)
    {
        self::$api_key = $api;
        self::$developmentType = $type;
    }

    /**
     * =====================
     * @return object
     */
    static public function AfricansTalkingProvider()
    {
        $provider = new AfricasTalkingIndex(self::$api_key, self::$developmentURL);
        return $provider->providerServices();
    }

    /**
     * =====================
     * @return object
     */
    static public function SterlingBankProvider()
    {
        $provider = new SterlingBankIndex(self::$api_key, self::$developmentURL);
        return $provider->providerServices();
    }


    /**
     * @return object
     */
    static public function FCMBProvider()
    {
        $provider = new FCMBIndex(self::$api_key, self::$developmentURL);
        return $provider->providerServices();
    }

    /**
     * =====================
     * @return object
     */
    static public function EcobankProvider()
    {
        $provider = new EcobankIndex(self::$api_key, self::$developmentURL);
        return $provider->providerServices();
    }

    /**
     * ====================
     * @return object
     */
    static public function WovenFinanceProvider()
    {
        $provider = new WovenFinanceIndex(self::$api_key, self::$developmentURL);
        return $provider->providerServices();
    }

    //...You can have other providers too here...

}