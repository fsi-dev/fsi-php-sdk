<?php


namespace FsiEngine\Providers\WEMA;


use FsiEngine\Constants\Meta;
use FsiEngine\Providers\Support\ProviderInterface;

class WemaIndex implements ProviderInterface
{

    protected $apiKey;
    protected $environmentURL;
    public static $defaultArrayObject   = [];
    protected $getAccount, $transactionHistories, $getAccountByPhoneNumber, $addBusiness, $createMerchant, $deleteMerchant,
        $deleteBusiness, $getAllMerchants, $getBusinessInformation, $getMerchantInformation,
        $merchantBusinesses, $updateBusiness, $updateMerchant, $getSettlementRecord, $performBulkSettlementAction,
        $initializeCardPayment, $transactionDetails, $merchantTransactions, $authenticateCardPayment, $listenToATransaction, $authenticateCallback,
        $getAllBills, $validateCustomer, $payBill, $authenticateUser, $changePassword, $confirmEmailChange, $verifyUsername, $verifyEmail, $confirmUserEmail,
        $editCorporate, $generateChangeEmailToken, $generatePasswordResetCode, $getCorporateDetails, $getUserAccountProfile, $getUserAccountDetails, $getWemaAccountDetails,
        $getWemaCorporateAccountDetails, $getCorporateAccount;

    public function  __construct($apiKey, $environmentURL = Meta::SANDBOX_URL) {
        $this->apiKey                       = $apiKey;
        $this->environmentURL               = $environmentURL;
        $this->getAccount                   = new GetAccount($this->apiKey, $this->environmentURL);
        $this->transactionHistories         = new TransactionHistories($this->apiKey, $this->environmentURL);
        $this->getAccountByPhoneNumber      = new GetAccountByPhoneNumber($this->apiKey, $this->environmentURL);
        $this->addBusiness                  = new AddBusiness($this->apiKey, $this->environmentURL);
        $this->createMerchant               = new CreateMerchant($this->apiKey, $this->environmentURL);
        $this->deleteMerchant               = new DeleteMerchant($this->apiKey, $this->environmentURL);
        $this->deleteBusiness               = new DeleteBusiness($this->apiKey, $this->environmentURL);
        $this->getAllMerchants              = new GetAllMerchants($this->apiKey, $this->environmentURL);
        $this->getBusinessInformation       = new GetBusinessInformation($this->apiKey, $this->environmentURL);
        $this->getMerchantInformation       = new GetMerchantInformation($this->apiKey, $this->environmentURL);
        $this->merchantBusinesses           = new GetMerchantBusinesses($this->apiKey, $this->environmentURL);
        $this->updateBusiness               = new UpdateBusiness($this->apiKey, $this->environmentURL);
        $this->updateMerchant               = new UpdateMerchant($this->apiKey, $this->environmentURL);
        $this->getSettlementRecord          = new GetSettlementRecord($this->apiKey, $this->environmentURL);
        $this->performBulkSettlementAction  = new PerformBulkSettlementAction($this->apiKey, $this->environmentURL);
        $this->initializeCardPayment        = new InitializeCardPayment($this->apiKey, $this->environmentURL);
        $this->transactionDetails           = new GetTransactionDetails($this->apiKey, $this->environmentURL);
        $this->merchantTransactions         = new GetMerchantTransactions($this->apiKey, $this->environmentURL);
        $this->authenticateCardPayment      = new AuthenticateCardPayment($this->apiKey, $this->environmentURL);
        $this->listenToATransaction         = new ListenToATransaction($this->apiKey, $this->environmentURL);
        $this->authenticateCallback         = new AuthenticateCallback($this->apiKey, $this->environmentURL);
        $this->getAllBills                  = new GetAllBills($this->apiKey, $this->environmentURL);
        $this->validateCustomer             = new ValidateCustomer($this->apiKey, $this->environmentURL);
        $this->payBill                      = new PayBill($this->apiKey, $this->environmentURL);
        $this->authenticateUser             = new AuthenticateUser($this->apiKey, $this->environmentURL);
        $this->changePassword               = new ChangePassword($this->apiKey, $this->environmentURL);
        $this->confirmEmailChange           = new ConfirmEmailChange($this->apiKey, $this->environmentURL);
        $this->verifyUsername               = new VerifyUsername($this->apiKey, $this->environmentURL);
        $this->verifyEmail                  = new VerifyEmail($this->apiKey, $this->environmentURL);
        $this->confirmUserEmail             = new ConfirmUserEmail($this->apiKey, $this->environmentURL);
        $this->editCorporate                = new EditCorporate($this->apiKey, $this->environmentURL);
        $this->generateChangeEmailToken     = new GenerateChangeEmailToken($this->apiKey, $this->environmentURL);
        $this->generatePasswordResetCode    = new GeneratePasswordResetCode($this->apiKey, $this->environmentURL);
        $this->getCorporateDetails          = new GetCorporateDetails($this->apiKey, $this->environmentURL);
        $this->getUserAccountProfile        = new GetUserAccountProfile($this->apiKey, $this->environmentURL);
        $this->getUserAccountDetails        = new GetUserAccountDetails($this->apiKey, $this->environmentURL);
        $this->getWemaAccountDetails        = new GetWemaAccountDetails($this->apiKey, $this->environmentURL);
        $this->getWemaCorporateAccountDetails = new GetWemaCorporateAccountDetails($this->apiKey, $this->environmentURL);
        $this->getCorporateAccount          = new GetCorporateAccount($this->apiKey, $this->environmentURL);

    }

    public function providerServices()
    {
        $resultObject                                   = (object)self::$defaultArrayObject; // - All services will come into this object
        $resultObject->GetAccount                       = $this->getAccount;
        $resultObject->TransactionHistories             = $this->transactionHistories;
        $resultObject->GetAccountByPhoneNumber          = $this->getAccountByPhoneNumber;
        $resultObject->AddBusiness                      = $this->addBusiness;
        $resultObject->CreateMerchant                   = $this->createMerchant;
        $resultObject->DeleteMerchant                   = $this->deleteMerchant;
        $resultObject->DeleteBusiness                   = $this->deleteBusiness;
        $resultObject->GetAllMerchants                  = $this->getAllMerchants;
        $resultObject->GetBusinessInformation           = $this->getBusinessInformation;
        $resultObject->GetMerchantInformation           = $this->getMerchantInformation;
        $resultObject->MerchantBusinesses               = $this->merchantBusinesses;
        $resultObject->UpdateBusiness                   = $this->updateBusiness;
        $resultObject->UpdateMerchant                   = $this->updateMerchant;
        $resultObject->GetSettlementRecord              = $this->getSettlementRecord;
        $resultObject->PerformBulkSettlementAction      = $this->performBulkSettlementAction;
        $resultObject->InitializeCardPayment            = $this->initializeCardPayment;
        $resultObject->GetTransactionDetails            = $this->transactionDetails;
        $resultObject->GetMerchantTransactions          = $this->merchantTransactions;
        $resultObject->AuthenticateCardPayment          = $this->authenticateCardPayment;
        $resultObject->ListenToATransaction             = $this->listenToATransaction;
        $resultObject->AuthenticateCallback             = $this->authenticateCallback;
        $resultObject->GetAllBills                      = $this->getAllBills;
        $resultObject->ValidateCustomer                 = $this->validateCustomer;
        $resultObject->PayBill                          = $this->payBill;
        $resultObject->AuthenticateUser                 = $this->authenticateUser;
        $resultObject->ChangePassword                   = $this->changePassword;
        $resultObject->ConfirmEmailChange               = $this->confirmEmailChange;
        $resultObject->VerifyUsername                   = $this->verifyUsername;
        $resultObject->VerifyEmail                      = $this->verifyEmail;
        $resultObject->ConfirmUserEmail                 = $this->confirmUserEmail;
        $resultObject->EditCorporate                    = $this->editCorporate;
        $resultObject->GenerateChangeEmailToken         = $this->generateChangeEmailToken;
        $resultObject->GeneratePasswordResetCode        = $this->generatePasswordResetCode;
        $resultObject->GetCorporateDetails              = $this->getCorporateDetails;
        $resultObject->GetUserAccountProfile            = $this->getUserAccountProfile;
        $resultObject->GetUserAccountDetails            = $this->getUserAccountDetails;
        $resultObject->GetWemaAccountDetails            = $this->getWemaAccountDetails;
        $resultObject->GetWemaCorporateAccountDetails   = $this->getWemaCorporateAccountDetails;


        return (object)$resultObject;

    }

}