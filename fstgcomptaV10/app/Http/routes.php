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


Route::resource('typeBudgets', 'TypeBudgetController');

Route::get('typeBudgets/{id}/delete', [
    'as' => 'typeBudgets.delete',
    'uses' => 'TypeBudgetController@destroy',
]);


Route::resource('anneeBudgetaires', 'AnneeBudgetaireController');

Route::get('anneeBudgetaires/{id}/delete', [
    'as' => 'anneeBudgetaires.delete',
    'uses' => 'AnneeBudgetaireController@destroy',
]);


Route::resource('budgetInitials', 'BudgetInitialController');

Route::get('budgetInitials/{id}/delete', [
    'as' => 'budgetInitials.delete',
    'uses' => 'BudgetInitialController@destroy',
]);


Route::resource('repartitions', 'RepartitionController');

Route::get('repartitions/{id}/delete', [
    'as' => 'repartitions.delete',
    'uses' => 'RepartitionController@destroy',
]);


Route::resource('budgetFonctionnements', 'BudgetFonctionnementController');

Route::get('budgetFonctionnements/{id}/delete', [
    'as' => 'budgetFonctionnements.delete',
    'uses' => 'BudgetFonctionnementController@destroy',
]);


Route::resource('budgetInvestissements', 'BudgetInvestissementController');

Route::get('budgetInvestissements/{id}/delete', [
    'as' => 'budgetInvestissements.delete',
    'uses' => 'BudgetInvestissementController@destroy',
]);

