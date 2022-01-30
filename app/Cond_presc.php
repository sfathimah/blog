<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Cond_presc extends Model
{
    protected $table="cond_prescs";

    protected $fillable = [
        'cond_id','presc_id','cf_value'
    ];
    // public function symptom()
    // {
    //     return $this->belongsToMany('App\Symptom');
    // }

    // public function symptoms(){

    //     return $this->belongsTo('App\Symptom', 'id');

    // }
    
}