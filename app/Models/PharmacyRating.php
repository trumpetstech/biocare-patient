<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PharmacyRating extends Model
{
    protected $fillable = ['patient_id', 'patient_name', 'doctor_id', 'body', 'rating', 'order_id'];
}
