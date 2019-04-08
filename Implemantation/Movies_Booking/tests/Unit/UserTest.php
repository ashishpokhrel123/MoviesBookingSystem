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
        $email="aashishpokhrel146@gmail.com";
        $password="Aashish123";
        $response=$this->call("GET", "/login/$email/$password");
        $this->assertEquals(404, $response->status());
    }
//    public function testRegister()
//    {
//        $name="Ashish";
//        $address="ktm";
//        $phone="981235677";
//        $email="aashishpokhrel125@gmail.com";
//        $password="Ashish123";
//        $response=$this->call("POST","/register/$name/$address/$phone/$email/$password");
//        $this->assertEquals(404,$response->status());
//    }
}
