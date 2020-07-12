<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorAppointment extends Model
{
    protected $guarded = [];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function messages()
    {
        return $this->hasMany(ChatMessage::class, 'appointment_id');
    }

    public function feedback()
    {
        return $this->hasOne(DoctorRating::class, 'appointment_id');
    }
}
