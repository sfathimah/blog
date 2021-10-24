<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Pending extends Model
{
    protected $fillable = [
        'date', 'time', 'dentist', 'service'
    ];
}