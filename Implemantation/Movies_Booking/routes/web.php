<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

   Route::get('/','MovieController@index');
   Route::get('/home','MovieController@index');

/*Auth for user*/
Auth::routes();
Route::group(['middleware'=>'admin'],function(){
    Route::get('/adminDashboard','AdminController@admindash');
    Route::get('/addmovie','MovieController@create');
    Route::post('/addmovie','MovieController@store');
    Route::get('/addShow','ShowController@index');
    Route::get('/addShow','ShowController@create');
    Route::post('/addShow','ShowController@store');
    Route::get('/viewmovie','MovieController@viewmovie');
    Route::get('/editmovies/{id}','MovieController@edit');
    Route::put('/editmovies/{id}','MovieController@movieupdate');
    Route::get('/addscreen','ScreenController@create');
    Route::post('/addscreen','ScreenController@store');
    Route::get('/addhall','HallController@create');
    Route::get('/addhall','ScreenController@show');
  
    Route::post('/addhall','HallController@store');
   
    ///Route::post('/addshow','ShowController@store');
});
//Route::get('/home','ShowController@index');

  Route::get('/showtime/{id}','MovieController@showmovies');
  Route::get('/','MovieController@index');
  Route::get('/about','HomeController@about');
  Route::get('/moviedetail/{id}','MovieController@showdetail');
  Route::get('/editprofile/{id}', 'ProfileController@profile');//display
  Route::put('/editprofile/{id}','ProfileController@profileupdate');//update
  Route::get('/addmovis','AdminController@addmovie');
Route::get('/myticket','TicketController@create');
Route::get('/myticket','TicketController@showbook');
//Route::get('/showtime/{id}','MovieController@showtime');
 Route::get('/showtime/{id}','ShowController@showtime');
    Route::get('/chooseseat/{id}/{mov_id}','HallController@seat');
//Route::get('/seat','ShowController@search');
  Route::get('/chooseseat','ShowController@readRate');
  Route::post('/chooseseat','SeatController@store');
  Route::get('ticket/{id}','TicketController@print');
  

