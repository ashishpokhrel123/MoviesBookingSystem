<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    protected $table="hall";
    public $primarykey="hall_id";
    protected $fillable=['show_id','screen_id'];
}
