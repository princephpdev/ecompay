<?php

namespace App\Http\Controllers;

use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use Illuminate\Http\Request;

class PaytmController extends Controller
{
    public function index(){
        return view('paytm.product');
    }

    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function order(Request $request)
    {
        $validated =  $request->validate([
            'email' => 'required|email',
            'mobile' => 'required',
            'amount' => 'required|numeric',
        ]);

        $payment = PaytmWallet::with('receive');
        $payment->prepare([
          'order' => rand(100,999999),
          'user' => rand(10,999),
          'mobile_number' => $request->mobile,
          'email' => $request->email,
          'amount' => $request->amount,
          'callback_url' => 'http://ecom.test/pay'
        ]);

        // dd($payment);
        return $payment->receive();
    }

    // public function status(Request $request){
    //     $data = $request->all();
    //     dd($data);
    // }

    /**
     * Obtain the payment information.
     *
     * @return Object
     */
    public function paymentCallback()
    {
        $transaction = PaytmWallet::with('receive');
        
        $response = $transaction->response(); // To get raw response as array
        //Check out response parameters sent by paytm here -> http://paywithpaytm.com/developer/paytm_api_doc?target=interpreting-response-sent-by-paytm

        if($transaction->isSuccessful()){
          //Transaction Successful
          return redirect('/')->with('message', 'Awesome its done');
        }else if($transaction->isFailed()){
          //Transaction Failed
          return redirect('/')->with('message', 'OO!! sorry');
        }else if($transaction->isOpen()){
          //Transaction Open/Processing
          return redirect('/')->with('message', 'Bhai Atak Gaya');
        }
        $transaction->getResponseMessage(); //Get Response Message If Available
        //get important parameters via public methods
        $transaction->getOrderId(); // Get order id
        $transaction->getTransactionId(); // Get transaction id
    }    
}
