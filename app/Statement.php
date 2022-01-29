<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    protected $table="statements";

    protected $fillable = [
        'dentist_id','patient_id','patient_name','date'
    ];
}
