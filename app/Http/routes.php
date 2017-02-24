<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::auth();

// Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

//Route::get('new_ticket', 'TicketsController@create');

//Route::post('new_ticket', 'TicketsController@store');

Route::get('add_ticket', 'TicketsController@create');

Route::post('add_new_ticket', 'TicketsController@store');

Route::get('my_tickets', 'TicketsController@userTickets');

Route::get('tickets/{ticket_id}', 'TicketsController@show');

Route::post('comment', 'CommentsController@postComment');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::get('tickets', 'TicketsController@index');
    Route::post('close_ticket/{ticket_id}', 'TicketsController@close');
});

Route::post('close_ticket/{ticket_id}', 'TicketsController@close');

Route::get('/', function () {
    return view('stapp');
});

// Route::group(['middleware' => ['web']], function () {
//     Route::resource('mytickets', 'TicketsController');
// });

Route::group(['middleware' => ['web']], function () {
    Route::resource('items', 'ItemController');
});

// Templates
Route::group(array('prefix'=>'/templates/'),function(){
    Route::get('{template}', array( function($template)
    {
        $template = str_replace(".php","",$template);
        View::addExtension('php','php');
        return View::make('templates.'.$template);
    }));
});

Route::get('tickets', 'TicketsController@userTickets2');
Route::get('isadmin', 'TicketsController@isadmin');
Route::get('isdeveloper', 'TicketsController@isdeveloper');
Route::get('userid', 'TicketsController@userid');
Route::post('reopen_ticket/{ticket_id}', 'TicketsController@reopen');
//Route::get('ticket_categories', 'TicketsController@create');
Route::post('devregister', 'TicketsController@devstore');
Route::get('devlist', 'TicketsController@devlist');
Route::post('deletedev/{id}', 'TicketsController@deletedev');
Route::post('devassignedto', 'TicketsController@devassignedto');
//Route::post('devassigneddetails', 'TicketsController@devassigneddetails');

