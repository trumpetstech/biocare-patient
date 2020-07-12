<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorNotification extends Model
{
    protected $fillable = ['message', 'link'];
}
