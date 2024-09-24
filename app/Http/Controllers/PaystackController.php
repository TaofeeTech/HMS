<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;



class PaystackController extends Controller
{


    // /**
    //  * Redirect the User to Paystack Payment Page
    //  * @return Url
    //  */
    // public function redirectToGateway()
    // {
    //     Log::info('Test log entry 001');
    //     try {
    //         return Paystack::getAuthorizationUrl()->redirectNow();
    //     } catch (\Exception $e) {
    //         return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
    //     }
    // }

    // /**
    //  * Obtain Paystack payment information
    //  * @return void
    //  */
    // public function handleGatewayCallback()
    // {
    //     Log::info('Test log entry 002');
    //     $paymentDetails = Paystack::getPaymentData();

    //     // dd($paymentDetails);
    //     Log::info('message:' .$paymentDetails);
    //     // Now you have the payment details,
    //     // you can store the authorization_code in your db to allow for recurrent subscriptions
    //     // you can then redirect or do whatever you want
    // }


    // public function pay_save(Request $request)
    // {

    //     $url = "https://api.paystack.co/transaction/initialize";

    //     $fields = [
    //         'email' => $request->email,
    //         'amount' => $request->price,
    //         'callback_url' => "http://127.0.0.1:8000/callback",
    //         'metadata' => ["cancel_action" => "https://your-cancel-url.com"]
    //     ];

    //     $fields_string = http_build_query($fields);

    //     //open connection
    //     $ch = curl_init();

    //     //set the url, number of POST vars, POST data
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //         "Authorization: Bearer sk_test_b5737d406584d9aab4bdde2c10a07e692972ffe7",
    //         "Cache-Control: no-cache",
    //     ));

    //     //So that curl_exec returns the contents of the cURL; rather than echoing it
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //     //execute post
    //     $result = curl_exec($ch);

    //     if (curl_errno($ch)) {
    //         return response()->json(['error' => curl_error($ch)], 500);
    //     }

    //     // Decode the result
    //     $result = json_decode($result, true); // Decode as associative array

    //     // Check for errors in the Paystack response
    //     if (isset($result['status']) && $result['status']) {
    //         $res = $result;
    //         return response()->json($result);
    //     } else {
    //         return response()->json(['error' => 'Transaction initialization failed'], 400);
    //     }

    // }

    public function pay_save(Request $request)
    {
        $url = "https://api.paystack.co/transaction/initialize";

        $fields = [
            'email' => $request->email,
            'amount' => $request->price * 100, // Paystack uses kobo, so multiply the price by 100
            'callback_url' => route('callback'), // Ensure you have the correct callback URL here
            'metadata' => [
                "cancel_action" => "https://your-cancel-url.com"
            ]
        ];

        $fields_string = http_build_query($fields);

        // Open connection
        $ch = curl_init();

        // Set the URL, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer sk_test_b5737d406584d9aab4bdde2c10a07e692972ffe7", // Add your secret key here
            "Cache-Control: no-cache",
        ));

        // So that curl_exec returns the contents of the cURL instead of echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute post
        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            return response()->json(['error' => curl_error($ch)], 500);
        }

        // Decode the result
        $result = json_decode($result, true); // Decode as associative array

        // Check for errors in the Paystack response
        if (isset($result['status']) && $result['status']) {
            return response()->json([
                'status' => true,
                'authorization_url' => $result['data']['authorization_url'],
                'access_code' => $result['data']['access_code'],
                'reference' => $result['data']['reference']
            ]);
        } else {
            return response()->json(['error' => 'Transaction initialization failed'], 400);
        }
    }



    public function callback(Request $request)
    {
        $reference = $request->query('reference');

        $url = "https://api.paystack.co/transaction/verify/" . rawurlencode($reference);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer sk_test_b5737d406584d9aab4bdde2c10a07e692972ffe7"
        ]);

        $result = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($result, true);

        if (isset($result['status']) && $result['status'] == true) {
            // Payment was successful, process the order
            $paymentDetails = $result['data'];
            Log::info(message: $paymentDetails);

            dd($paymentDetails);

            // Example: Update booking status, save transaction info, etc.

            // return view('payment_success', ['paymentDetails' => $paymentDetails]);
        } else {
            // Payment failed or was canceled
            return view('payment_failed');
        }
    }




    // $result = json_decode($result, true);

    // $response = ['type'=> true ,'res'=> $result];

    // return view('welcome', compact('response'));

























    // public function initializeTransaction(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'email' => 'required|email',
    //         'price' => 'required|numeric',
    //     ]);

    //     $url = "https://api.paystack.co/transaction/initialize";

    //     $fields = [
    //         'email' => $request->email,
    //         'amount' => $request->price * 100, // Convert to kobo
    //     ];

    //     $fields_string = http_build_query($fields);

    //     // Open connection
    //     $ch = curl_init();

    //     // Set the URL, number of POST vars, POST data
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, [
    //         "Authorization: Bearer sk_test_b5737d406584d9aab4bdde2c10a07e692972ffe7",
    //         "Cache-Control: no-cache",
    //     ]);

    //     // Return the contents of the cURL
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //     $result = curl_exec($ch);

    //     // Check for cURL errors
    //     if (curl_errno($ch)) {
    //         return response()->json(['error' => curl_error($ch)], 500);
    //     }

    //     // Decode the result
    //     $result = json_decode($result, true); // Decode as associative array

    //     // Check for errors in the Paystack response
    //     if (isset($result['status']) && $result['status']) {
    //         $codea = $result['data']['access_code'];
    //         return response()->json(['access_code' => $codea]);
    //     } else {
    //         return response()->json(['error' => 'Transaction initialization failed'], 400);
    //     }
    // }

    // public function success()
    // {
    //     return "payment is successfull";
    // }

    // public function cancel()
    // {
    //     return "payment is cancelled";
    // }
}
