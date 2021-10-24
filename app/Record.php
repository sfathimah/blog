<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Record extends Model
{
    protected $fillable = [
        'patientID', 'ath', 'athNotes', 'si', 'siNotes', 'cm', 'cmNotes', 'al', 'alNotes', 'ot', 'otNotes'
    ];
}