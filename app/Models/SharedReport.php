<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SharedReport extends Model
{
    protected $fillable = ['report_url', 'doctor_id', 'patient_id', 'test_name'];
}
