<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Bookedmeeting extends Model
{
    protected $fillable = [
        'patientid','date', 'service', 'dentistid', 'dentistname', 'slot', 'symptom', 'status'
    ];

    protected $table = 'bookedmeetings';
}
