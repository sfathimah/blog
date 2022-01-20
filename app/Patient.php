<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'PatientID', 'Patient_Name'
    ];

    protected $table = 'patient';
}
