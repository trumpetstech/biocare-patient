<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $fillable = ['message', 'type', 'appointment_id', 'sender_id', 'by_doctor'];

    public function sender()
    {
        if($this->by_doctor)
        {
            return $this->belongsTo(Doctor::class, 'sender_id');
        } else {
            return $this->belongsTo(Patient::class, 'sender_id');
        }
    }

    public function appointment()
    {
        return $this->belongsTo(DoctorAppointment::class, 'appointment_id');
    }
}
