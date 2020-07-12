<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pharmacy;

class PharmacyFeedbackController extends Controller
{
    public function store(Pharmacy $pharmacy)
    {
        $pharmacy->ratings()->create(['patient_name' => patient()->name,
        'patient_id' => patient()->id,
        'order_id' => request('order_id'),
        'body' => request('body'), 'rating' => request('rating')]);

        $pharmacy->avg_rating = $pharmacy->ratings()->avg('rating');
        $pharmacy->save();

        
        $pharmacy->notify('You received a new feedback from ' . patient()->name, '/profile');

        toastr()->success("Your Feedback is submitted!");

        return back();
    }
}
