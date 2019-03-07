<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AdminController extends Controller
{
    public function admindash()
    {
        return view('admin.admindasboard');
    }
    
    public function addmovie()
    {
        return view('admin.addMovie');
       
    }
}
