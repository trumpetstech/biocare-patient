<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CovidVitalsController extends Controller
{
    public function store()
    {
         patient()->covid->vitals()->create(request()->all());

         if(request('oxygen') <= 94 || request('temperature') >= 100 || request('pulse_rate') >= 100 || request('pulse_rate') <= 60 )
         {
                patient()->covid->status = 2;
                patient()->covid->save();

                toastr()->error('You need attention please contact authorities!');

                foreach(patient()->covid->group->members as $doctor) {
                    $doctor->notify(patient()->covid->name . ' needs attention!', '/covid-patients/' . patient()->covid->id );
                }

         } else {
            toastr()->success('Your vitals are sent to doctor successfully!');

            foreach(patient()->covid->group->members as $doctor) {
               $doctor->notify(patient()->covid->name . ' updated vital details!', '/covid-patients/' . patient()->covid->id );
           }
         }

       

         return back();
    }
}
