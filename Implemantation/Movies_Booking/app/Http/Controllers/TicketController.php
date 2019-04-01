<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Booking;
use DB;
use App\Show;
use App\Movie;
use App\Hall;

class TicketController extends Controller
{
    public function create()
    { 
           if(Auth::check())
           {
            return view('customers.myticket');
           }
           else
           {
               return view ('auth.login');
           }
        
    }
    public function showbook()
    {
        $user=Auth::user()->id;
        $book=DB::table('booking')
        ->join('movies','movies.mov_id','=','booking.mov_id')
        ->join('shows','shows.show_id','=','booking.show_id')
        ->select('movies.mov_title','shows.show_date','shows.show_time','booking.book_seats','booking.totprice','booking.book_id')
        ->where('booking.user_id',$user)
        ->get();

          return view('customers.myticket', compact(['book']));
         /* echo "<pre>";
          print_r($book);
          exit();*/
    }
    public function print($id)
    {
        $books=DB::table('booking')
        ->join('movies','movies.mov_id','=','booking.mov_id')
        ->join('shows','shows.show_id','=','booking.show_id')
     
        ->select('movies.mov_title','shows.show_date','shows.show_time','booking.book_seats','booking.totprice','booking.book_id','booking.screen')
        ->where('booking.book_id',$id)
        ->get();

          return view('customers.ticket', compact(['books']));
         /* echo "<pre>";
          print_r($book);
          exit();*/
    }
      public function edit($id,$time) 
      {
        $book=DB::table('booking')
        ->join('shows','shows.show_id','=','booking.mov_id')
        ->select('booking.*')
        ->where('shows.show_time',$time)
       ->get();
      

         return view('customers.editbooking', compact(['book']));
      }
      public function update(Request $request, $id)
      {
        $this->validate(request(),[
            'totseat'=>'required',
            'totprice'=>'required',
            'seats'=>'required',
        ]);
        $book = Booking::find($id);
        $book=new Booking();
        $book->user_id=$request->user_id;
        $book->mov_id=$request->mov_id;
        $book->show_id=$request->show_id;
        $book->screen=$request->screentype;
        $book->book_seats=$request->seats;
        $book->totprice	=$request->totprice;
        $book->save();
        return redirect()->to('/myticket')->with('success','SeatBooking Is Updated');
      }
      public function destroy($id)
      {
        $book=Booking::find($id);

      
            $book->delete();
            return redirect()->to('/myticket')->with('success','Ticket Deleted Succefully');
  
  
      }
}
