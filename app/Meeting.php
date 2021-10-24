<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Meeting extends Model
{
    protected $fillable = [
        'patientID','date', 'time', 'dentist', 'service', 'status'
    ];
}