<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::filter('notloggedin', function()
{
    if (!(Auth::check()))
        {
            return Redirect::to('login');
        }
});

Route::filter('loggedin', function()
{
    if (Auth::check())
        {
            return Redirect::to('users/show');
        }
});


Route::get('/', function()
{
    if (!Auth::check())
        {
            return Redirect::to('login');
        }
    else
        {
            return Redirect::to('users/show');
        }
    /* return View::make('hello'); */
});


/* Route::resource('users', 'UsersController'); */
/* Route::resource('users', 'UsersController', array('before' => 'loggedin', 'only' => array('store'))); */
/* Route::resource('users', 'UsersController', array('before' => 'notloggedin', 'only' => array('show'))); */
/* Route::resource('sessions', 'sessionsController', array('before' => 'loggedin', 'only' => array('store'))); */
/* Route::resource('sessions', 'sessionsController', array('before' => 'notloggedin', 'only' => array('destroy'))); */
/* Route::resource('messages', 'messagesController', array('before' => 'notloggedin', 'only' => array('store'))); */
/* Route::resource('comments', 'commentsController', array('before' => 'notloggedin', 'only' => array('store'))); */

Route::get('signup', array('before' => 'loggedin', 'as' => 'signup', 'uses' => 'UsersController@create'));
Route::post('users', array('before' => 'loggedin', 'as' => 'users.store', 'uses' => 'UsersController@store'));
Route::get('users/show', array('before' => 'notloggedin', 'as' => 'show', 'uses' => 'UsersController@show'));
Route::get('users/saved', array('before' => 'notloggedin', 'as' => 'saved', 'uses' => 'UsersController@saved'));

Route::get('login', array('before' => 'loggedin', 'as' => 'login', 'uses' => 'SessionsController@create'));
Route::post('sessions', array('before' => 'loggedin', 'as' => 'sessions.store', 'uses' => 'SessionsController@store'));
Route::delete('sessions', array('before' => 'notloggedin', 'as' => 'sessions.destroy', 'uses' => 'SessionsController@destroy'));

Route::post('messages', array('before' => 'notloggedin', 'as' => 'messages.store', 'uses' => 'MessagesController@store'));
Route::post('comments', array('before' => 'notloggedin', 'as' => 'comments.store', 'uses' => 'CommentsController@store'));

Route::post('up_votes', array('before' => 'notloggedin', 'as' => 'up_votes.store', 'uses' => 'UpVotesController@store'));
Route::delete('up_votes', array('before' => 'notloggedin', 'as' => 'up_votes.destroy', 'uses' => 'UpVotesController@destroy'));

Route::post('down_votes', array('before' => 'notloggedin', 'as' => 'down_votes.store', 'uses' => 'DownVotesController@store'));
Route::delete('down_votes', array('before' => 'notloggedin', 'as' => 'down_votes.destroy', 'uses' => 'DownVotesController@destroy'));

Route::post('favourites', array('before' => 'notloggedin', 'as' => 'favourites.store', 'uses' => 'FavouritesController@store'));
Route::delete('favourites', array('before' => 'notloggedin', 'as' => 'favourites.destroy', 'uses' => 'FavouritesController@destroy'));


// Long Polling
/* Route::get('messages/checkin_poll', array('before' => 'notloggedin', 'uses' => 'MessagesController@get_checkin_poll')); */