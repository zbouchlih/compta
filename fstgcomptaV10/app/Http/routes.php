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

Route::resource('roles', 'RoleController');

Route::get('roles/{id}/delete', [
    'as' => 'roles.delete',
    'uses' => 'RoleController@destroy',
]);


Route::resource('rights', 'RightController');

Route::get('rights/{id}/delete', [
    'as' => 'rights.delete',
    'uses' => 'RightController@destroy',
]);


Route::resource('roleRights', 'RoleRightController');

Route::get('roleRights/{id}/delete', [
    'as' => 'roleRights.delete',
    'uses' => 'RoleRightController@destroy',
]);


Route::resource('typebudgets', 'TypebudgetController');

Route::get('typebudgets/{id}/delete', [
    'as' => 'typebudgets.delete',
    'uses' => 'TypebudgetController@destroy',
]);


Route::resource('anneebudgetaires', 'AnneebudgetaireController');

Route::get('anneebudgetaires/{id}/delete', [
    'as' => 'anneebudgetaires.delete',
    'uses' => 'AnneebudgetaireController@destroy',
]);




Route::resource('repartitions', 'RepartitionController');

Route::get('repartitions/{id}/delete', [
    'as' => 'repartitions.delete',
    'uses' => 'RepartitionController@destroy',
]);


Route::resource('budgets', 'BudgetController');

Route::get('budgets/{id}/delete', [
    'as' => 'budgets.delete',
    'uses' => 'BudgetController@destroy',
]);




Route::resource('comptes', 'CompteController');

Route::get('comptes/{id}/delete', [
    'as' => 'comptes.delete',
    'uses' => 'CompteController@destroy',
]);


Route::resource('comptes', 'CompteController');

Route::get('comptes/{id}/delete', [
    'as' => 'comptes.delete',
    'uses' => 'CompteController@destroy',
]);
