<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorAppointment;

class DoctorPaymentController extends Controller
{
    public function pay(DoctorAppointment $appointment)
    {
        $checkSum = "";
        $paramList = array();
        $paramList["MID"] = env('PAYTM_MERCHANT_MID');
        $paramList["ORDER_ID"] = 'ORDER_' . uniqid();
        $paramList["CUST_ID"] = $appointment->patient->id;
        $paramList["INDUSTRY_TYPE_ID"] = "Retail";
        $paramList["CHANNEL_ID"] = "WEB";
        $paramList["TXN_AMOUNT"] = $appointment->fees;
        $paramList["WEBSITE"] = env('PAYTM_MERCHANT_WEBSITE');
        $paramList["CALLBACK_URL"] =  env('APP_URL') . '/appointments/' . $appointment->id . '/payments/response';

        $checkSum = getChecksumFromArray($paramList,env('PAYTM_MERCHANT_KEY'));

        return view('doctors.appointments.pay', compact('checkSum', 'paramList'));
    }

    public function response(DoctorAppointment $appointment)
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
               
                
                patient()->doctor_payments()->create([
                    'doctor_id' => $appointment->doctor_id,
                    'amount' => request('TXNAMOUNT'),
                    'patient_name' => patient()->name,
                    'status' => 1,
                    'doctor_appointment_id' => $appointment->id
                ]);

                $appointment->paid = 1;
                $appointment->save();

                if($appointment->appointment_type) {
                    $appointment->doctor->notify('You have a new virtual appointment request from ' . patient()->name, '/appointments');

                    toastr()->success('Virtual Appointment request sent successfully to doctor ' . $appointment->doctor->name);
            
                } else {
                    toastr()->success('Appointment payment successfull!');

                    $appointment->doctor->notify('You received a payment from ' . $appointment->patient->name, '/appointments/' . $appointment->id);
    
                }
                

                return redirect('/appointments/' . $appointment->id);
                //Process your transaction here as success transaction.
                //Verify amount & order id received from Payment gateway with your application's order id and amount.
            }

            toastr()->error('Appointment payment failed!');

            return redirect('/appointments/' . $appointment->id);
        } else {
            toastr()->error('Appointment payment failed!');

            return redirect('/appointments/' . $appointment->id);
        }
         
    }
}
