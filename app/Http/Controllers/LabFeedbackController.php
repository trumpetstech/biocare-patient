<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lab;

class LabFeedbackController extends Controller
{
    public function store(Doctor $doctor)
    {
        $lab->ratings()->create(['patient_name' => patient()->name,
        'patient_id' => patient()->id,
        'appointment_id' => request('appointment_id'),
        'body' => request('body'), 'rating' => request('rating')]);

        $lab->avg_rating = $lab->ratings()->avg('rating');
        $lab->save();

       // $lab->notify('You received a new feedback from ' . patient()->name, '/profile');

        toastr()->success("Your Feedback is submitted!");

        return back();
    }
}
