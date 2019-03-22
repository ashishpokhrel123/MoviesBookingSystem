<?php

namespace App\Http\Controllers;
use App\Hall;
use App\Screen;
use DB;
use App\Booking;
use Auth;
use Illuminate\Http\Request;



class SeatController extends Controller
{
   
    public function store(Request $request)
    {
        $this->validate(request(),[
            'totseat'=>'required',
            'totprice'=>'required',
            'seats'=>'required',
        ]);
        
        $book=new Booking();
        $book->user_id=$request->user_id;
        $book->mov_id=$request->mov_id;
        $book->show_id=$request->show_id;
        $book->screen=$request->screentype;
        $book->book_seats=$request->seats;
        $book->totprice	=$request->totprice;
        $book->save();
        return redirect()->to('/home')->with('success','SeatBooking Is confirm');
    }
}
