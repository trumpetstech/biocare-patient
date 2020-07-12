<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Pusher\Pusher;

class Doctor extends Model
{
    public function category()
    {
        return $this->belongsTo(DoctorCategory::class, 'category_id');
    }

    public function clinics()
    {
        return $this->hasMany(DoctorClinic::class, 'doctor_id');
    }

    public function hospitals()
    {
        return $this->hasMany(DoctorHospital::class, 'doctor_id');
    }

    public function ratings()
    {
        return $this->hasMany(DoctorRating::class, 'doctor_id');
    }

    public function notifications()
    {
        return $this->hasMany(DoctorNotification::class, 'doctor_id');
    }

    public function getAvatarUrlAttribute()
    {
        return isset($this->attributes['avatar_url']) && $this->attributes['avatar_url'] != ''  ? $this->attributes['avatar_url'] : '/images/avatar.png';
    }

    
    public function timings()
    {
        return $this->hasMany(DoctorTiming::class, 'doctor_id');
    }

    public function leaves()
    {
        return $this->hasMany(DoctorLeave::class, 'doctor_id');
    }


    public function notify($message, $link)
    {
        $this->notifications()->create(['message' => $message, 'link' => $link]);
        $pusher = new Pusher(env('PUSHER_APP_KEY'), env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'), array('cluster' => env('PUSHER_APP_CLUSTER')));
        $pusher->trigger('doctor-' . $this->id . '-notifications', 'new-notification', ['message' => $message, 'link' => $link]);
        
    }


}
