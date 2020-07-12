<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\DoctorAppointment;


class DoctorAppointmentsController extends Controller
{
    public function index()
    {
        $appointments = patient()->appointments()->where('status', '>=', 0)
                                ->where('status', '<', 2);
       
        if(request()->has('from_date')  && request('from_date') != '') {
            $appointments = $appointments->where('date', '>=', request('from_date')); 
        }

        if(request()->has('to_date') && request('to_date') != '') {
            $appointments = $appointments->where('date', '<=', request('to_date')); 
        }

        $appointments = $appointments->orderBy('date', 'ASC')->get();

        return view('doctors.appointments.index', compact('appointments'));

    }

    public function consulted()
    {
        $appointments = patient()->appointments()->where('status', 2);
       
        if(request()->has('from_date')  && request('from_date') != '') {
            $appointments = $appointments->where('date', '>=', request('from_date')); 
        }

        if(request()->has('to_date') && request('to_date') != '') {
            $appointments = $appointments->where('date', '<=', request('to_date')); 
        }

        $appointments = $appointments->orderBy('date', 'DESC')->get();

        return view('doctors.appointments.consulted', compact('appointments'));

    }

    public function book(Doctor $doctor, $type, $locationId)
    {
        $postData = [];

        if($type == 'clinics') {
            $location = $doctor->clinics()->where('id', $locationId)->first();
            $postData['clinic_id'] = $location->id;
        }
        else if($type == 'hospitals') {
            $location = $doctor->hospitals()->where('id', $locationId)->first();
            $postData['hospital_id'] = $hospital->id;
        }

        $postData = [
            'doctor_id' => $doctor->id,
            'patient_id' => patient()->id,
            'doctor_name' => $doctor->name,
            'patient_name' => patient()->name,
            'date' => request('date'),
            'time' => request('time'),
            'location_name' => $location->name,
            'appointment_type' =>  request('appointment_type')
        ];

        if(request('appointment_type') == 1) {
            $postData['fees'] = $doctor->efees;
        }
        
        $appointment = DoctorAppointment::create($postData);

        if(request('appointment_type') == 1) {
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
        } else {
            $doctor->notify('You have a new appointment request from ' . patient()->name, '/appointments');

            toastr()->success('Appointment request sent successfully to doctor ' . $doctor->name);
    
            return redirect('/appointments');
        }

     
    
      
    }

    public function show(DoctorAppointment $appointment)
    {
        return view('doctors.appointments.show', compact('appointment'));
    }

    public function showBookingForm(Doctor $doctor, $type, $locationId)
    {
        $ftype = '';
        if($type == 'clinics') {
            $location = $doctor->clinics()->where('id', $locationId)->first();
            $ftype = 'c_';
        }
        else if($type == 'hospitals') {
            $location = $doctor->hospitals()->where('id', $locationId)->first();
            $ftype = 'h_';
        }

        $timings = $doctor->timings()->where('location_id', $location->id)
                ->where('type', $ftype)->where('date', request('date'))->first();

            
            $morningSlots = getServiceScheduleSlots(30, '12:00AM', '12:00PM');
            $afternoonSlots = getServiceScheduleSlots(30, '12:00PM', '05:00PM');
            $eveningSlots = getServiceScheduleSlots(30, '05:00PM', '08:00PM');
            $nightSlots = getServiceScheduleSlots(30, '08:00PM', '11:00PM');    

        return view('doctors.book', compact('doctor', 'type', 'location', 'morningSlots', 'afternoonSlots', 'eveningSlots', 'nightSlots', 'timings'));
    }

    public function call(DoctorAppointment $appointment)
    {
        return view('doctors.appointments.call', compact('appointment'));
    }
}
