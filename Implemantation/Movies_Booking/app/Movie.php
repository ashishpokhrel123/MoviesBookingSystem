<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table="movies";
    public $primarykey="mov_id";
    protected $dateformat='M d,Y';
    protected $fillable = [
        'mov_title','mov_director','mov_cast', 'mov_type', 'mov_language','mov_realsedate',
        'mov_duration','image','mov_url','mov_description'
    ];

/*get Image path*/
    protected $casts = [
        'mov_type' => 'array'
    ];

    public function show()
    {
        return $this->hasmany('App\Show');
    }
}