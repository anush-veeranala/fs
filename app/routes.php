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


Route::get('signup', array('before' => 'loggedin', 'as' => 'signup', 'uses' => 'UsersController@create'));
Route::resource('users', 'UsersController', array('before' => 'loggedin', 'only' => array('store')));
Route::resource('users', 'UsersController', array('before' => 'notloggedin', 'only' => array('show')));


Route::get('login', array('before' => 'loggedin', 'as' => 'login', 'uses' => 'SessionsController@create'));
Route::resource('sessions', 'sessionsController', array('before' => 'loggedin', 'only' => array('store')));
Route::resource('sessions', 'sessionsController', array('before' => 'notloggedin', 'only' => array('destroy')));

Route::resource('messages', 'messagesController', array('before' => 'notloggedin', 'only' => array('create', 'store')));
