<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    protected $table="shows";
    protected $fillable=['show_date','show_time','mov_id','rate'];
    
}
