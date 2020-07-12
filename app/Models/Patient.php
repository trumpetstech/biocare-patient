<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['user_id', 'name', 'dob', 'city', 'blood_group', 'phone', 
    'gender', 'email', 'address', 'state', 'country', 'pincode', 'avatar_url'];

    public function appointments()
    {
        return $this->hasMany(DoctorAppointment::class, 'patient_id');
    }

    public function lab_appointments()
    {
        return $this->hasMany(LabAppointment::class, 'patient_id');
    }

    public function pharmacy_orders()
    {
        return $this->hasMany(PharmacyOrder::class, 'patient_id');
    }

    public function reports()
    {
        return $this->hasMany(LabReport::class, 'patient_id');
    }

    public function shared_videos()
    {
        return $this->hasMany(SharedVideo::class, 'patient_id');
    }

    public function history()
    {
        return $this->hasOne(PatientHistory::class, 'patient_id');
    }

    public function covid()
    {
        return $this->hasOne(PatientCovid::class, 'patient_id');
    }

    public function shared_reports()
    {
        return $this->hasMany(SharedReport::class, 'patient_id');
    }

    public function notifications()
    {
        return $this->hasMany(UserNotification::class, 'patient_id');
    }

    public function doctor_payments()
    {
        return $this->hasMany(DoctorPayment::class, 'patient_id');
    }

    public function lab_payments()
    {
        return $this->hasMany(LabPayment::class, 'patient_id');
    }

    public function pharmacy_payments()
    {
        return $this->hasMany(PharmacyPayment::class, 'patient_id');
    }

    public function getAvatarUrlAttribute()
    {
        return isset($this->attributes['avatar_url']) && $this->attributes['avatar_url'] != ''  ? $this->attributes['avatar_url'] : '/images/avatar.png';
    }

    public function getFullAddressAttribute()
    {
        return $this->address . ', ' . $this->city . ', ' . $this->state . ', ' . $this->country;
    }
}
