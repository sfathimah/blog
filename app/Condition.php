<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Condition extends Model
{
    protected $table="conditions";

    protected $fillable = [
        'name'
    ];

    // public function symptoms()
    // {
    //     return $this->belongsToMany('App\Symptom');
    // }
}