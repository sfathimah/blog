<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class MedicalRecord extends Model
{
    protected $fillable = [
        'PatientID', 'admit', 'admit_reason', 'admit_treatment',
        'illness', 'illness_reason', 'illness_treatment',
        'medication', 'medication_notes',
        'allergies', 'allergies_notes', 'pregnancy','pregnancy_notes',
        'others', 'others_notes'
    ];
}