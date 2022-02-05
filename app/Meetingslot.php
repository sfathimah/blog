<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;

class Meetingslot extends Model
{
    protected $fillable = [
        'date', 'dentistid', 'slot', 'booked' 
    ];

    protected $table = 'meetingslots';
}