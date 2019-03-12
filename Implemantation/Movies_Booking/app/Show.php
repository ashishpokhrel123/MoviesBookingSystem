<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    protected $table="shows";
    public $primarykey="show_id";
    protected $fillable=['show_date','show_time','mov_id','rate'];
    
}
