<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientCovid extends Model
{
    protected $fillable = ["name",
    "dob",
    "blood_group",
    "gender",
    "phone",
    "address",
    "city",
    "state" ,
    "country",
    "passport_no",
    "country_travelled",
    "reason_travelled",
    "travel_date",
    "stay_duration",
    "date_in_nashik",
    "healtcare_contact_date",
    "patient_symptoms",
    "other_symptoms",
    "treating_doctor_details",
    "full_address",
    "patient_admitted_date",
    "patient_condition",
    "follow_up_date",
    "family_symptoms",
    "family_other_symptoms",
    "family_treating_doctor",
    "has_consent",
    "group_id",
    "covid_package_id",
    "is_positive",
    "package_end_date",
    "status"];

    protected $dates = ['package_end_date'];

    public function group()
    {
        return $this->belongsTo(DoctorGroup::class, 'group_id');
    }

    public function vitals()
    {
        return $this->hasMany(CovidPatientVital::class, 'covid_patient_id');
    }

    public function messages()
    {
        return $this->hasMany(CovidChatMessage::class, 'covid_patient_id');
    }

    public function package()
    {
        return $this->belongsTo(CovidPackage::class, 'covid_package_id');
    }

    public function package_payments()
    {
        return $this->hasMany(CovidPackagePayment::class, 'covid_id');
    }

    public function getHasActivePackageAttribute()
    {
        return $this->package_end_date->gt(\Carbon\Carbon::now());
    } 
}
