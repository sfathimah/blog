<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Diagnosis extends Model
{
    protected $table="diagnosis";

    protected $fillable = [
        'dentist_id','patient_id','sel_symp','sel_cond','sel_presc','notes'
    ];
}