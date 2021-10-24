<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Symptom extends Model
{
    // protected $table="symptoms";

    protected $fillable = [
        'name'
    ];

    // public function conditions()
    // {
    //     return $this->belongsToMany('App\Condition', 'rule_relations', 'symp_id', 'cond_id');
    // }

//     public function rule_relation()
// {
//     return $this->belongsToMany('App\Rule_relation');
// }

        public function rule_relation(){

            return $this->belongsTo('App\Rule_relation', 'symp_id');

        }
}