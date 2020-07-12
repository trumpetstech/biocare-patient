<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CovidPackagePayment extends Model
{
    protected $fillable = [
        'group_id',
        'package_id',
        'amount',
        'patient_name',
        'status'
    ];

}
