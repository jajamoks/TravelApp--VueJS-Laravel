<?php

namespace App;

use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

class AuthorizeTransaction
{

    protected $merchantAuth;
    protected $customerAddress;
    protected $customerData;
    protected $duplicateWindowSetting;
    protected $transactionRequestType;
    protected $paymentInfo;
    protected $payment;
    protected $user;
    protected $request;
    protected $cart;
    protected $lineitem;

    public function __construct(User $user, array $paymentInfo, EscapeCart $cart)
    {
        $this->user = $user;
        $this->paymentInfo = $paymentInfo;
        $this->cart = $cart;
        $this->setMerchantAuth();
        $this->setTransactionWindow();
        $this->setLineItems();
        $this->setCustomerInfo();
        $this->setCreditCard();
        $this->setOrderInfo();
        $this->setTransactionRequest();
    }

    private function setMerchantAuth()
    {
        $this->merchantAuth = new AnetAPI\MerchantAuthenticationType();
        $this->merchantAuth->setName(env('AUTHORIZE_ID'));
        $this->merchantAuth->setTransactionKey(env('AUTHORIZE_KEY'));
    }

    private function setTransactionWindow()
    {
        $this->duplicateWindowSetting = new AnetAPI\SettingType();
        $this->duplicateWindowSetting->setSettingName("duplicateWindow");
        $this->duplicateWindowSetting->setSettingValue("10");
    }

    private function setLineItems()
    {
        // Line Item Info
        $this->lineitem = new AnetAPI\LineItemType();
        $this->lineitem->setItemId($this->cart->escape->id);
        $this->lineitem->setName(substr(
            $this->cart->escape->escape_type->name,
            0,
            30
        ));
        $this->lineitem->setDescription(
            $this->cart->escape->short_display_date .' '. $this->cart->room
        );
        $this->lineitem->setQuantity("1");
        $this->lineitem->setUnitPrice(
            $this->paymentInfo['charge_amount'] / 100
        );
        $this->lineitem->setTaxable("N");
    }

    private function setOrderInfo()
    {
        $this->order = new AnetAPI\OrderType();
        $this->order->setDescription($this->paymentInfo['charge_type']);
    }

    private function setCustomerInfo()
    {
        $this->customerAddress = new AnetAPI\CustomerAddressType();
        $this->customerData = new AnetAPI\CustomerDataType();
        $this->customerAddress->setFirstName($this->user->first_name);
        $this->customerAddress->setLastName($this->user->last_name);
        $this->customerAddress->setAddress($this->user->address);
        $this->customerAddress->setCity($this->user->city);
        $this->customerAddress->setState($this->user->state);
        $this->customerAddress->setZip($this->user->zip);
        $this->customerAddress->setCountry($this->user->country);
        $this->customerData->setType("individual");

        $this->customerData->setId($this->user->id);
        $this->customerData->setEmail($this->user->email);
    }

    private function setCreditCard()
    {
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($this->paymentInfo['credit_card_number']);
        $creditCard->setExpirationDate(
            $this->formatExpirationDate(
                $this->paymentInfo['expiration_month'],
                $this->paymentInfo['expiration_year']
            )
        );
        $creditCard->setCardCode($this->paymentInfo['cvv_code']);
        $this->payment = new AnetAPI\PaymentType();
        $this->payment->setCreditCard($creditCard);
    }

    private function setTransactionRequest()
    {
        $this->transactionRequestType = new AnetAPI\TransactionRequestType();
        $this->transactionRequestType->setTransactionType("authCaptureTransaction");
        $this->transactionRequestType->setAmount($this->paymentInfo['charge_amount'] / 100);
        $this->transactionRequestType->setOrder($this->order);
        $this->transactionRequestType->setPayment($this->payment);
        $this->transactionRequestType->setBillTo($this->customerAddress);
        $this->transactionRequestType->setCustomer($this->customerData);
        $this->transactionRequestType->addToTransactionSettings($this->duplicateWindowSetting);
        $this->transactionRequestType->addToLineItems($this->lineitem);
        $this->request = new AnetAPI\CreateTransactionRequest();
        $this->request->setMerchantAuthentication($this->merchantAuth);
        $this->request->setRefId('ref_'. time());
        $this->request->setTransactionRequest($this->transactionRequestType);
    }

    public function run()
    {
        $controller = new AnetController\CreateTransactionController($this->request);
        $response = $controller->executeWithApiResponse(config('authorize'));
        if ($response !== null) {
            $tresponse = $response->getTransactionResponse();
            if (( $tresponse != null) && ($tresponse->getResponseCode()=="1")) {
                return [
                    'status' => 'success',
                    'transaction' => [
                        'amount' => $this->paymentInfo['charge_amount'],
                        'auth_code' => $tresponse->getAuthCode(),
                        'trans_id' => $tresponse->getTransID()
                    ]
                ];
            } else {
                if ($tresponse != null && count($tresponse->getErrors()) > 0) {
                    $error = $tresponse->getErrors()[0];
                    $message = $error->getErrorText();
                    return [
                        'status' => 'failure',
                        'message' => $message
                    ];
                } else {
                    return $this->onFatalError();
                }
            }
        } else {
            return $this->onFatalError();
        }
    }

    private function onFatalError()
    {
        return [
            'status' => 'failure',
            'message' => 'We are sorry. There was an error processing your reservation. Please call 888-882-0448.'
        ];
    }

    private function formatExpirationDate($month, $year)
    {
        return $month. substr($year, -2);
    }
}
