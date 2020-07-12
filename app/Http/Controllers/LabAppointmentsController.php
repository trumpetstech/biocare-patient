<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lab;

class LabAppointmentsController extends Controller
{
    public function index()
    {
        $appointments = patient()->lab_appointments()->where('status', '>=', 0)
                                ->where('status', '<', 2);
       
        if(request()->has('from_date')  && request('from_date') != '') {
            $appointments = $appointments->where('appointment_date', '>=', request('from_date')); 
        }

        if(request()->has('to_date') && request('to_date') != '') {
            $appointments = $appointments->where('appointment_date', '<=', request('to_date')); 
        }

        $appointments = $appointments->orderBy('appointment_date', 'ASC')->get();

        return view('labs.appointments.index', compact('appointments'));

    }

    public function book(Lab $lab)
    {
        $postData = [
            'patient_id' => patient()->id,
            'patient_name' => patient()->name,
            'patient_address' => patient()->address,
            'patient_phone' => request('contact_no'),    
            'tests' => '',
            'is_walk_in' => 0,
            'appointment_date' => request('date'),
            'appointment_time' => request('time'),
        ];

        $lab->appointments()->create($postData);

        toastr()->success('Lab appointment requested successfully!');

        return redirect('/lab-appointments');
    }


}
