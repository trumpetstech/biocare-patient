<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PharmacyPayment extends Model
{
    protected $fillable = ['pharmacy_id',
    'amount',
    'patient_name',
    'status',
    'pharmacy_order_id'];
}
