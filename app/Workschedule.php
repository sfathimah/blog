<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Workschedule extends Model
{
    protected $fillable = [
        'start', 'end', 'DentistID', 'workload' 
    ];

    protected $table = 'workschedules';
}