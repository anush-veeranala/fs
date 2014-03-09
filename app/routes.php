<?php



Route::get('login', array('as' => 'login', 'uses' => 'UsersController@create'));
Route::resource('user', 'UsersController', array('only' => array('store', 'show')));

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
    return View::make('hello');
});