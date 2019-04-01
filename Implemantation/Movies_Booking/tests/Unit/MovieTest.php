<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MovieTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testaddMovie()
    {
       $mov_title="dhamal";
       $mov_director="asbc";
       $mov_cast="acn,qwe";
       $mov_type="english";
       $mov_realasedate="29 april 2019";
       $mov_duration="120min";
       $image="image";
       $mov_url="gsdgsv";
       $mov_description="cxdcsghcxdc";
       $response=$this->call("POST","/addMovies/ $mov_title/$mov_director/$mov_cast/$mov_type/$mov_realasedate
       /$mov_duration/$image/$mov_url/$mov_description");
       $this->assertEquals(404,$response->status());

    }
}
