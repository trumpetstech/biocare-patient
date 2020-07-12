<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\DoctorCategory;

class DoctorsController extends Controller
{
    public function index()
    {
        $doctors = Doctor::where('verified', 1)->where('is_admin', 0);

     
        if(request()->has('city')) {
            $doctors = $doctors->whereRaw('LOWER(city) = ?', strtolower(request('city')));
        }

        

        if(request()->has('category_id')) {
            $doctors = $doctors->where('category_id', request('category_id'));
        }

        if(request()->has('appointment_type') && request('appointment_type') == 1) {
            $doctors = $doctors->where('provides_econsult', 1);
        }

        $doctors = $doctors->get();


        return view('doctors.index', compact('doctors'));

    }

    public function find()
    {
        $categories = DoctorCategory::all();
        return view('doctors.find', compact('categories'));
    }

    
    public function show(Doctor $doctor)
    {
        return view('doctors.show', compact('doctor'));
    }

    public function book(Doctor $doctor)
    {
        return view('doctors.book', compact('doctor'));
    }
    
}
