<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorPayment extends Model
{
    protected $fillable = ['doctor_id',
    'amount',
    'patient_name',
    'status',
    'doctor_appointment_id'];
}
