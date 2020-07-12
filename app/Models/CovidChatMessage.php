<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CovidChatMessage extends Model
{
    protected $fillable = ['message', 'type', 'covid_patient_id', 'sender_id', 'by_doctor'];

    public function sender()
    {
        if($this->by_doctor)
        {
            return $this->belongsTo(Doctor::class, 'sender_id');
        } else {
            return $this->belongsTo(Patient::class, 'sender_id');
        }
    }

    public function covid()
    {
        return $this->belongsTo(PatientCovid::class, 'covid_patient_id');
    }
}
