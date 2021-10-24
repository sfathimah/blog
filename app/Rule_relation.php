<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Rule_relation extends Model
{
    protected $table="rule_relations";

    protected $fillable = [
        'cond_id','symp_id','cf_value'
    ];
    // public function symptom()
    // {
    //     return $this->belongsToMany('App\Symptom');
    // }

    public function symptoms(){

        return $this->belongsTo('App\Symptom', 'id');

    }
    
}