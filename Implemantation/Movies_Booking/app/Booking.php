<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table="booking";
    protected $primarykey="book_id";
    protected $fillable=['user_id','mov_id','show_id','	screen','book_seats','totprice'];
}
