<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SeatTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testchooseseat()
    {
        $user_id="1";
       $mov_id="1";
       $show_id="1";
      
       $screen="Audi1";
       $book_seats="1,2,3";
       $totprice="1200";
  
       $response=$this->call("POST","/chooseseat/ $user_id/$mov_id/$show_id/$screen/$book_seats
       /$totprice");
       $this->assertEquals(404,$response->status());

    }
}
