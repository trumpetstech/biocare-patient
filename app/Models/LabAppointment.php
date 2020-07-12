<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabAppointment extends Model
{
    protected $fillable = ['patient_id',
    'patient_name',
    'patient_address',
    'patient_phone',
    'tests',
    'is_walk_in',
    'appointment_date',
    'appointment_time'];

    public function lab()
    {
        return $this->belongsTo(Lab::class, 'lab_id');
    }

    public function getSelectedTestsAttribute()
    {
        return '';
        // $testIds = json_decode($this->tests);

        // $tests = [];

        // foreach($testIds as $id)
        // {
        //     $tests[] = LabTest::find($id)->name;
        // }

        // return implode(',', $tests);
    }
}
