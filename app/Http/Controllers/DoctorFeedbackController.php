<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorFeedbackController extends Controller
{
    public function store(Doctor $doctor)
    {
        $doctor->ratings()->create(['patient_name' => patient()->name,
        'patient_id' => patient()->id,
        'appointment_id' => request('appointment_id'),
        'body' => request('body'), 'rating' => request('rating')]);

        $doctor->avg_rating = $doctor->ratings()->avg('rating');
        $doctor->save();

        $doctor->notify('You received a new feedback from ' . patient()->name, '/profile');

        toastr()->success("Your Feedback is submitted!");

        return back();
    }
}
