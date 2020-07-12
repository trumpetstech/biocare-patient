<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Pusher\Pusher;

class Pharmacy extends Model
{
    public function getFullAddressAttribute()
    {
        return $this->address . ', ' . $this->city . ', ' . $this->state . ', ' . $this->country;
    }

    
    public function ratings()
    {
        return $this->hasMany(PharmacyRating::class, 'pharmacy_id');
    }

    public function orders()
    {
        return $this->hasMany(PharmacyOrder::class, 'pharmacy_id');
    }

    public function category()
    {
        return $this->belongsTo(PharmacyCategory::class, 'category_id');
    }

    public function notifications()
    {
        return $this->hasMany(PharmacyNotification::class, 'pharmacy_id');
    }

    public function notify($message, $link)
    {
        $this->notifications()->create(['message' => $message, 'link' => $link]);
        $pusher = new Pusher(env('PUSHER_APP_KEY'), env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'), array('cluster' => env('PUSHER_APP_CLUSTER')));
        $pusher->trigger('pharmacy-' . $this->id . '-notifications', 'new-notification', ['message' => $message, 'link' => $link]);
        
    }

}
