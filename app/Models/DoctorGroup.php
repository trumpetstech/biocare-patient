<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorGroup extends Model
{
    public function getAvatarUrlAttribute()
    {
        return isset($this->attributes['avatar_url']) && $this->attributes['avatar_url'] != ''  ? $this->attributes['avatar_url'] : '/images/avatar.png';
    }

    public function members()
    {
        return $this->hasMany(Doctor::class, 'group_id');
    }

    public function packages()
    {
        return $this->hasMany(CovidPackage::class, 'group_id');
    }

}
