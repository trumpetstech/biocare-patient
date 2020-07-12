<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CovidPatientVital extends Model
{
    protected $fillable = ['temperature', 'oxygen', 'pulse_rate', 'covid_patient_id'];
}
