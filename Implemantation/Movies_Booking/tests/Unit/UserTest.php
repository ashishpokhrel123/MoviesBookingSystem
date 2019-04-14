<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $email="anishbudhathoki123@gmail.com";
        $password="Anish123";
        $response=$this->call("GET", '/login',[
         'username'=>$email,
         'password'=>$password

         ]);
         $this->assertEquals(200, $response->status());
    }

    public function testRegister()
 {
      $name="Anish";
       $address="ktm";
      $phone="981235677";
      $email="anishbudhathoki123@gmail.com";
     $password="Anish123";
      $response=$this->call("POST",'/register',[
          'name'=>$name,
          'address'=>$address,
          'phone'=>$phone,
          'username'=>$email,
       'password'=>$password
      ]);
     $this->assertEquals(302,$response->status());
  }
  public function testSendMessage()
    {
     $mov_title="tottal dhamal";
     $mov_director="anil sharma";
     $mov_cast="anil kappor";
     $mov_type="comedy";
     $mov_lang="hindi";
     $mov_realasedate="2019-04-05";
     $mov_duration="120min";
     $mov_url="qwerty";
     $image="image";
     $mov_description="this is fanstic movie";
     $mov_description="1";
         $response=$this->call("POST",'/addMovie',[
             'mov_title'=>$mov_title,
             'mov_director'=> $mov_director,
             'mov_cast'=>$mov_cast,
             'mov_type'=> $mov_type,
             'mov_lang'=> $mov_lang,
             'mov_realasedate'=> $mov_realasedate,
             'mov_duration'=>  $mov_duration,
             'mov_url'=>   $mov_url,
             'image'=> $image,
             'mov_description'=> $mov_description,
             'realasedstatus'=> $mov_description,
         ]);
         $this->assertEquals(302,$response->status());
     }
     public function testFrienRequest()
       {
           $show_date="2019-04-08";
           $show_time="12:00:30 Am";
           $movie="total dhamal";
           $response=$this->call("POST",'/addShow',[
               'show_date'=>$show_date,
               'show_time'=>$show_time,
               'movies'=> $movie,


           ]);
          $this->assertEquals(302,$response->status());
       }
       public function testSearchuser()
  {
      $book_id="1";
      $mov_id="1";
      $show_id="1";
      $screen="audi1";
      $book_seats="1,2,3";
      $totprice="Rs 900";
      $response=$this->call("POST",'/chooseseat',[
          'book_id'=>$book_id,
          '$mov_id'=>$mov_id,
          '$show_id'=> $show_id,
           'screen'=>$screen,
           'book_seats'=>$book_seats,
           'totprice'=>$totprice,
      ]);
     $this->assertEquals(302,$response->status());
   }
}
