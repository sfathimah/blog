<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statement_data extends Model
{
    protected $table="statement_datas";

    protected $fillable = [
        'statement_id','presc_id','qty','remark'
    ];
}
