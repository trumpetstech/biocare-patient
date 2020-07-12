<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PharmacyOrder extends Model
{

    protected $fillable = ['patient_id',
    'patient_name',
    'address',
    'contact_no',
    'doctor_name',
    'prescription_type',
    'order_items',
    'delivery_type'];

    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class, 'pharmacy_id');
    }

    public function patient()
    {
        return $this->belongsTo(patient::class, 'patient_id');
    }

    public function feedback()
    {
        return $this->hasOne(PharmacyRating::class, 'order_id');
    }
}
