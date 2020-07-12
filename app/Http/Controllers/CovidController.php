<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorGroup;
use App\Models\CovidPackage;
use App\Models\PatientCovid;
use Carbon\Carbon;

class CovidController extends Controller
{
    public function form()
    {
        $covid = PatientCovid::where('patient_id', patient()->id)->first();
        $groups = DoctorGroup::orderBy('name', 'ASC')->get();

        return view('covid.index', compact('covid', 'groups'));
    }

    public function store()
    {
        $data = request()->all();

        if(request()->has('patient_symptoms')) {
            $data['patient_symptoms'] = json_encode($data['patient_symptoms']);
        } 

        if(request()->has('family_symptoms')) {
            $data['family_symptoms'] = json_encode($data['family_symptoms']);
        } 

        $covid = PatientCovid::where('patient_id', patient()->id)->first();

        $data['group_id'] = 2;

        if(request()->has('covid_package_id'))
        {
            $package = CovidPackage::find(request('covid_package_id'));
            return redirect('/covid/' . $covid->id . '/pay/' . $package->id);
        }
        
        if($covid) {
            $covid->update($data);
        } else {
            patient()->covid()->create($data);
        }

      

        return redirect('/covid');
    }
}
