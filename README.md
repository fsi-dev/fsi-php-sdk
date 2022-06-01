


![enter image description here](https://fsi.ng/assets/img/main_logo.png) 
<br>
# `PHP SDK`

### **`Introduction`**
This package provides services for integrating provider APIs into your application in written code. 
The sdk was built for easy access of the providers under 
FSI to be easily integrated into your development codebase. 

### **`API Providers`**
This package has numerous API providers under FSI. You can find the API providers in your FSI sandbox dashboard (`https://fsi.ng/members/apis`)
.<br>

### **`Installation`**
 - Clone this repository: `git clone https://github.com/fsi-dev/fsi-php-sdk`
 - Install the dependencies: `composer install`
 - Confirm by running all tests: `composer test`

Now you're free to use this SDK to your advantage. You can now integrate the `sdk` into your application codebase.


### **`Usage`**
You can easily use this `sdk` in your php/laravel local project, after cloning:
1. First, add the FSIEngine and the Meta class to your respective controller class:<br><br>
`use FsiEngine\SDK\FsiEngine;`<br>

2. You can declare `FsiEngine` class any where in your controller class to initialize FSI Engine SDK but it's advisable to declare in your construct method for easy access across the methods in your controller class:<br><br>
        
        use FsiEngine\SDK\FsiEngine;

        class myCustomClassName {
            public function __construct() {
                // Initialize FSI Engine
                FsiEngine::init($YOUR_SANDBOX_KEY, $DEPLOYMENT_TYPE);
            }
        }

        // init() method takes in two parameters ($YOUR_SANDBOX_KEY,  $DEPLOYMENT_TYPE):

    `$YOUR_SANDBOX_KEY` : The sandbox application key is located right inside the application sample that you created for your application. You click on the Applications section on the left menu of your dashboard to access all your applications:

    + Applicantions
        -  [My Applications](https://fsi.ng/members/my-applications)

    `$DEPLOYMENT_TYPE`: This is a flag that indicates what type of deployment you're trying to use the `sdk` for. FSI Engine provides two types of deployment type:
    + Testing
    + Live

            use FsiEngine\Constants\Meta;

            Meta::TESTING_DEPLOYMENT_TYPE // This is for testing
            Meta::LIVE_DEPLOYMENT_TYPE // This is for when you want to go live

    You can use this Meta constants as your parameter value when initializing the FSI Engine SDK.

3. You can now write to any of the available API providers in the `SDK` package and send http requests:

        $processAirtimeProvider = FsiEngine::AfricasTalkingProvider()->Airtime;
        $response = $processAirtimeProvider->send($formData);

        // send() method takes in 2 parameters (array $MY_FORM_DATA, array $REQUEST_HEADER)
    `$MY_FORM_DATA` : This is the request body/parameters that would be passed through the http request.<br>
    `$REQUEST_HEADER` : This is a set of data that is passed across to the http request header. This is in form of an `array`.


### **`Example`**

This is example of how you can make calls to any of the providers:

        use FsiEngine\Constants\Meta;
        use FsiEngine\SDK\FsiEngine;

        class myCustomClassName{

            public function __construct() {
                //Initialize FSI Engine SDK
                FsiEngine::init(Meta::TESTING_APP_KEY, Meta::TESTING_DEPLOYMENT_TYPE);
            }

            public function myCustomMethod(){
                $formData = [
                    "Referenceid"           => '01',
                    "RequestType"           => '01',
                    "Translocation"         => '01',
                    "Bvn"                   => '01139174927',
                    "billerid"              => '01'

                ];

                $header = [ // Additional Headers...
                    'Ocp-Apim-Subscription-Key' => 't',
                    'Ocp-Apim-Trace'            => 'true',
                    'Appid'                     => 69,
                    'ipval'                     => 0
                ];

                $processGetBillersISWProvider = FsiEngine::SterlingBankProvider()->GetBillersISW;
                $response = $processGetBillersISWProvider->send($formData, $header);

            }
        }
        

### **`Contributing`**

Please see our [Contribution Guide](https://docs.google.com/document/d/1qOXxA8IMm4xKo1LQd8Fodrn8Hk6VL70As5YTX9w_9yo/edit?usp=sharing) for details.

### **`Security`**

If you discover any security-related issues, please email info@fsi.ng instead of using the issue tracker.

### **`Contact Us`**
In the case of security vulnerabilities, bug detection and other development queries, you can contact info@fsi.ng and also you can call us on 08033080471.

