<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MojoController extends Controller
{
    public function index()
    {
        //  return view('product');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/oauth2/token/');     
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        
        $payload = Array(
            'grant_type' => 'client_credentials',
            'client_id' => 'test_5204001938fb43598f331ffe4ef',
            'client_secret' => 'test_a852c2a1a0b51449939cc32a039'
        );

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch); 
        // dd($response);
        echo $response;
    }
    public function pay(Request $request){

        // dd($request);

        // $authType = "app"; /**Depend on app or user based authentication**/

        // $api = \Instamojo\Instamojo::init($authType,[
        //         "client_id" =>  "config('services.instamojo.api_key')",
        //         "client_secret" => "config('services.instamojo.auth_token')",
        //         // "username" => 'FOO', /** In case of user based authentication**/
        //         // "password" => 'XXXXXXXX' /** In case of user based authentication**/

        // ],true); /** true for sandbox enviorment**/
  
    //   $api = new \Instamojo\Instamojo(
    //          config('services.instamojo.api_key'),
    //          config('services.instamojo.auth_token'),
    //          config('services.instamojo.url')
    //      );
  
    //  try {
    //      $response = $api->createPaymentRequest(array(
    //          "purpose" => "For text Php Coding Stuff",
    //          "amount" => $request->amount,
    //          "buyer_name" => "$request->name",
    //          "send_email" => true,
    //          "email" => "$request->email",
    //          "phone" => "$request->mobile_number",
    //          "redirect_url" => "http://127.0.0.1:8000/pay-success"
    //          ));
              
    //          dd($response);
    //         //  header('Location: ' . $response['longurl']);
    //          exit();
    //  }catch (\Exception $e) {
    //      print('Error: ' . $e->getMessage());
    //  }
  }
  
  public function success(Request $request){
    //   try {
  
    //     $authType = "app"; /**Depend on app or user based authentication**/

    //     $api = \Instamojo\Instamojo::init($authType,[
    //             "client_id" =>  "config('services.instamojo.api_key')",
    //             "client_secret" => "config('services.instamojo.auth_token')",
    //             // "username" => 'FOO', /** In case of user based authentication**/
    //             // "password" => 'XXXXXXXX' /** In case of user based authentication**/

    //     ],true); /** true for sandbox enviorment**/
  
    //      $response = $api->getPaymentRequestDetails(request('payment_request_id'));
  
    //      if( !isset($response['payments'][0]['status']) ) {
    //         dd('payment failed');
    //      } else if($response['payments'][0]['status'] != 'Credit') {
    //           dd('payment failed');
    //      } 
    //    }catch (\Exception $e) {
    //       dd('payment failed');
    //   }
    //  dd($response);
   }
 
}
