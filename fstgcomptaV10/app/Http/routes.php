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

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => '$NAMESPACE_API_CONTROLLER$'], function ()
{
	Route::group(['prefix' => 'v1'], function ()
	{
        include_once Config::get('generator.path_api_routes');
	});
});


Route::resource('profiles', 'ProfileController');

Route::get('profiles/{id}/delete', [
    'as' => 'profiles.delete',
    'uses' => 'ProfileController@destroy',
]);


Route::resource('users', 'UserController');

Route::get('users/{id}/delete', [
    'as' => 'users.delete',
    'uses' => 'UserController@destroy',
]);

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);