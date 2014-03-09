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

Route::get('/', function()
{
    if (!Auth::check())
        {
            return Redirect::to('login');
        }
    else
        {
            return Redirect::to('users.show');
        }
    /* return View::make('hello'); */
});


Route::filter('loggedin', function()
{
    if (!Auth::check())
        {
            return Redirect::to('login');
        }
});


Route::get('signup', array('as' => 'signup', 'uses' => 'UsersController@create'));
Route::resource('users', 'UsersController', array('only' => array('store')));

Route::resource('users', 'UsersController', array('before' => 'loggedin', 'only' => array('show')));


Route::get('login', array('as' => 'login', 'uses' => 'SessionsController@create'));
Route::resource('sessions', 'sessionsController', array('only' => array('store', 'destroy')));
