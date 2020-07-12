<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientCovid;
use App\Models\CovidPackage;
use App\Models\DoctorGroup;

class CovidPaymentsController extends Controller
{
    public function pay(PatientCovid $covid, CovidPackage $package)
    {
        $checkSum = "";
        $paramList = array();
        $paramList["MID"] = env('PAYTM_MERCHANT_MID');
        $paramList["ORDER_ID"] = 'COVID_PACKAGE_ORDER_' . uniqid();
        $paramList["CUST_ID"] = patient()->id;
        $paramList["INDUSTRY_TYPE_ID"] = "Retail";
        $paramList["CHANNEL_ID"] = "WEB";
        $paramList["TXN_AMOUNT"] = $package->amount;
        $paramList["WEBSITE"] = env('PAYTM_MERCHANT_WEBSITE');
        $paramList["CALLBACK_URL"] =  env('APP_URL') . '/covid/' . $covid->id . '/payments/'. $package->id . '/response';

        $checkSum = getChecksumFromArray($paramList,env('PAYTM_MERCHANT_KEY'));

        return view('doctors.appointments.pay', compact('checkSum', 'paramList'));
    }

    public function response(PatientCovid $covid, CovidPackage $package) {
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
               
                
                $covid->package_payments()->create([
                    'group_id' => $covid->group_id,
                    'package_id' => $package->id,
                    'amount' => request('TXNAMOUNT'),
                    'patient_name' => $covid->name,
                    'status' => 1,
                ]);

                $covid->paid = 1;
                $covid->covid_package_id = $package->id;
                $covid->package_end_date = \Carbon\Carbon::now()->addDays($package->no_of_days)->toDateTimeString();
                $covid->save();

                $group = DoctorGroup::find($covid->group_id);
                foreach($group->members as $doctor) {
                    $doctor->notify($covid->name . ' registered as new covid patient in your group!', '/covid-patients/' . $covid->id );
                }
                
                toastr()->success('Covid package payment successfull!');


                return redirect('/covid');
                //Process your transaction here as success transaction.
                //Verify amount & order id received from Payment gateway with your application's order id and amount.
            }

            toastr()->error('Covid Package Payment failed!');

            return redirect('/covid');
        } else {
            toastr()->error('Covid Package failed!');

            return redirect('/covid');
        }
    }
}
