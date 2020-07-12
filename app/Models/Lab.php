<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{

    public function appointments()
    {
        return $this->hasMany(LabAppointment::class, 'lab_id');
    }

    public function category()
    {
        return $this->belongsTo(PharmacyCategory::class, 'category_id');
    }

    public function available_tests()
    {
        return $this->belongsToMany(LabTest::class, 'lab_available_tests', 'lab_id', 'lab_test_id');
    }

    public function ratings()
    {
        return $this->hasMany(LabRating::class, 'lab_id');
    }

    public function getFullAddressAttribute()
    {
        return $this->address . ', ' . $this->city . ', ' . $this->state . ', ' . $this->country;
    }

   
}
