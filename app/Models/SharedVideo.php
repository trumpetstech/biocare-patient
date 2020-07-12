<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SharedVideo extends Model
{
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}
