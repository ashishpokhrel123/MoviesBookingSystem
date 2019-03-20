<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    protected $table="screen";
    public $primarykey="screen_id";
    protected $fillable=['screen_type'];
}
