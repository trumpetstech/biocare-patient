<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pharmacy;
use App\Models\DoctorAppointment;

class PharmacyController extends Controller
{
    public function index()
    {
        $pharmacies = Pharmacy::where('verified', 1);

     
        if(request()->has('city')) {
            $pharmacies = $pharmacies->whereRaw('LOWER(city) = ?', strtolower(request('city')));
        }

        
        if(request()->has('delivery_type') && request('delivery_type') == 1) {
            $doctors = $doctors->where('home_delivery', 1);
        }

        $pharmacies = $pharmacies->get();

        $appointment = null;
        if(request()->has('appointment_id')) {
            $appointment = DoctorAppointment::find(request('appointment_id'));
        }


        return view('pharmacies.index', compact('pharmacies', 'appointment'));

    }

    public function book(Pharmacy $pharmacy)
    {
        $appointment = null;
        if(request()->has('appointment_id')) {
            $appointment = DoctorAppointment::find(request('appointment_id'));
        }
        return view('pharmacies.book', compact('pharmacy', 'appointment'));
    }
}
