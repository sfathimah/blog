<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Page extends Model
{
    protected $table="users";
    protected $fillable = [
        'name', 'icno', 'email','phone','address', 'password'
    ];
}