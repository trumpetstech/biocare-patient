<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PharmacyNotification extends Model
{
    protected $fillable = ['message', 'link'];
}
