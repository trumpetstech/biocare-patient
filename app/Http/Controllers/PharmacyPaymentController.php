<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PharmacyOrder;

class PharmacyPaymentController extends Controller
{
    public function pay(PharmacyOrder $order)
    {
        $checkSum = "";
        $paramList = array();
        $paramList["MID"] = env('PAYTM_MERCHANT_MID');
        $paramList["ORDER_ID"] = 'ORDER_' . uniqid();
        $paramList["CUST_ID"] = $order->patient->id;
        $paramList["INDUSTRY_TYPE_ID"] = "Retail";
        $paramList["CHANNEL_ID"] = "WEB";
        $paramList["TXN_AMOUNT"] = $order->total_price;
        $paramList["WEBSITE"] = env('PAYTM_MERCHANT_WEBSITE');
        $paramList["CALLBACK_URL"] =  env('APP_URL') . '/orders/' . $order->id . '/payments/response';

        $checkSum = getChecksumFromArray($paramList,env('PAYTM_MERCHANT_KEY'));

        return view('doctors.appointments.pay', compact('checkSum', 'paramList'));
    }

    public function response(PharmacyOrder $order)
    {
        $paytmChecksum = "";
        $paramList = array();
        $isValidChecksum = "FALSE";

        $paramList = request()->all();
        $paytmChecksum = request()->has('CHECKSUMHASH') ? request('CHECKSUMHASH') : ""; //Sent by Paytm pg

        //Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
        $isValidChecksum = verifychecksum_e($paramList, env('PAYTM_MERCHANT_KEY'), $paytmChecksum); //will return TRUE or FALSE string.
        
        if($isValidChecksum == "TRUE") {
            if (request('STATUS') == "TXN_SUCCESS") {
                // echo "<b>Transaction status is success</b>" . "<br/>";
               
                
                patient()->pharmacy_payments()->create([
                    'pharmacy_id' => $order->pharmacy_id,
                    'amount' => request('TXNAMOUNT'),
                    'patient_name' => patient()->name,
                    'status' => 1,
                    'pharmacy_order_id' => $order->id
                ]);

                $order->paid = 1;
                $order->save();

               
                  toastr()->success('Order payment successfull!');

                    // Notify Pharmacy
                  $order->pharmacy->notify('You received a payment from ' . $order->patient->name, '/orders/' . $order->id);
    
                

                return redirect('/orders/' . $order->id);
                //Process your transaction here as success transaction.
                //Verify amount & order id received from Payment gateway with your application's order id and amount.
            }

            toastr()->error('Order payment failed!');

            return redirect('/orders/' . $order->id);
        } else {
            toastr()->error('Order payment failed!');

            return redirect('/orders/' . $order->id);
        }
         
    }
}
