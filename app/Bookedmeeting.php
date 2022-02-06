<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Bookedmeeting extends Model
{
    protected $fillable = [
        'patientid','date', 'service', 'dentistid', 'dentistname', 'slot', 'symptom', 'status', 'diagnosis_id', 'statement_id'
    ];

    protected $table = 'bookedmeetings';
}
