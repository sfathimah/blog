<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Appointmentsetting extends Model
{
    protected $fillable = [
        'service', 'Tfactor', 'time'
    ];
}