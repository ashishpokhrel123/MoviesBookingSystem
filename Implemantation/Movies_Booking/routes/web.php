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
/*Auth for user*/
Auth::routes();
Route::group(['middleware'=>'admin'],function(){
    Route::get('/adminDashboard','AdminController@admindash');
    Route::get('/addmovie','MovieController@create');
    Route::post('/addmovie','MovieController@store');
    
    Route::get('/addShow','ShowController@create');
    Route::post('/addShow','ShowController@store');
   
    ///Route::post('/addshow','ShowController@store');
});
Route::get('/home','ShowController@index');
Route::get('/','MovieController@index');


Route::get('/editprofile/{id}', 'ProfileController@profile');//display
Route::put('/editprofile/{id}','ProfileController@profileupdate');//update
/*Auth for admin */
Route::get('/addmovis','AdminController@addmovie');
Route::get('/home','MovieController@index');
Route::get('/moviedetail/{id}','MovieController@showdetail');


Route::get('/showtime/{id}','MovieController@showtime');
Route::get('/showtime','ShowController@showtime');


