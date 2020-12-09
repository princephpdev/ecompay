<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;

class RazorController extends Controller
{

    public function index(){
        return view('product');
    }

    public function order(Request $request){
        
        $validated = $request->validate([
            'amount' => 'required|numeric'
        ]);

        $amount = $request->input('amount') * 100;

        $random = rand(5,55555);

        $api_key = env('rzr_id');
        $api_secret = env('rzr_secret');
        $api = new Api($api_key, $api_secret);

        $order = $api->order->create(array(
            'receipt' => $random, //Order id or any detail related to product for internal reference
            'amount' => $amount,
            'currency' => 'INR'
            )
          );
        $order_id = $order['id'];
        
        return view('product', compact('order_id', 'amount', 'random'));
        // return redirect('/', compact('order_id', 'amount'));
    }

    public function pay(Request $request){
        $data = $request->all();

        // dd($data);
       
        $api_key = env('rzr_id');
        $api_secret = env('rzr_secret');
        $api = new Api($api_key, $api_secret);

        $signature = $request->razorpay_signature;
        $orderid = $request->razorpay_order_id;
        $payment_id = $request->razorpay_payment_id;

        // return $signature;
       
        $attributes  = array('razorpay_signature'  => $signature,  'razorpay_payment_id'  => $payment_id ,  'razorpay_order_id' => $orderid);
        $order  = $api->utility->verifyPaymentSignature($attributes);

       if($order !== '')
       {
           return view('success', compact('data'));
       }

    }

}
