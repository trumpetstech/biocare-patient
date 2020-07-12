<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientHistory extends Model
{
    protected $fillable = [
        'patient_id',
        'maritial_status',
        'no_of_children',
        'occupation',
        'education',
        'social_status',
        'addiction',
        'history_of_contraception',
        'hisk_risk_behaviour',
        'present_complaints',
        'demanded_blood_transfusion',
        'other_medicals',
        'past_treatment',
        'drug_allergy',
        'surgical_intervention',
        'oral_contraception',
        'blood_transfusion',
        'nsaid_intake',
        'regular_medicine_user',
        'menarche',
        'duration_of_period',
        'quantity_of_blood_loss',
        'menstural_irregularities',
        'date_of_last_menstural',
        'menopause',
        'no_of_pregnancies',
        'outcome_of_pregnancies',
        'complications_during_pregancy',
        'mode_of_delivery',
        'last_child_birth_date'
    ];
}
