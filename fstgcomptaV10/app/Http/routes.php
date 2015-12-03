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
Route::get('indexajaxRepartition','RepartitionController@indexajax');

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
Route::get('indexajaxcomptes','CompteController@indexajax');

Route::get('comptes/{id}/delete', [
    'as' => 'comptes.delete',
    'uses' => 'CompteController@destroy',
]);


Route::resource('comptes', 'CompteController');

Route::get('comptes/{id}/delete', [
    'as' => 'comptes.delete',
    'uses' => 'CompteController@destroy',
]);


Route::resource('compterepartitions', 'CompterepartitionController');
Route::post('compterepartitions/storeAjax','CompterepartitionController@storeAjax');
Route::get('indexajax','CompterepartitionController@indexajax');


Route::get('compterepartitions/{id}/delete', [
    'as' => 'compterepartitions.delete',
    'uses' => 'CompterepartitionController@destroy',
]);

Route::get('compterepartitions/{idAnnee}/create', [
    'as' => 'compterepartitions.creer',
    'uses' => 'CompterepartitionController@create',
]);

Route::get('compterepartitions/{idAnnee}/index', [
    'as' => 'compterepartitions.index',
    'uses' => 'CompterepartitionController@index',
]);

Route::post('compterepartitions/{idAnnee}/index', [
    'as' => 'compterepartitions.index',
    'uses' => 'CompterepartitionController@index',
]);

Route::get('repartitions/{idAnnee}/editall', [
    'as' => 'repartitions.editall',
    'uses' => 'RepartitionController@editall',
]);

Route::post('repartitions/{idAnnee}/updateall', [
    'as' => 'repartitions.updateall',
    'uses' => 'RepartitionController@updateall',
]);



Route::resource('typedepenses', 'TypedepenseController');

Route::get('typedepenses/{id}/delete', [
    'as' => 'typedepenses.delete',
    'uses' => 'TypedepenseController@destroy',
]);


Route::resource('depenses', 'DepenseController');

Route::get('depenses/{id}/delete', [
    'as' => 'depenses.delete',
    'uses' => 'DepenseController@destroy',
]);

Route::get('depenses/{id}/valider', [
    'as' => 'depenses.valider',
    'uses' => 'DepenseController@valider',
]);

Route::get('depenses/{id}/demander', [
    'as' => 'depenses.demander',
    'uses' => 'DepenseController@demander',
]);

Route::get('depenses/{id}/{etat}/index', [
    'as' => 'depenses.index',
    'uses' => 'DepenseController@index',
]);

Route::get('depenses/{id}/create', [
    'as' => 'depenses.create',
    'uses' => 'DepenseController@create',
]);


Route::resource('tests', 'TestController');

Route::get('tests/{id}/delete', [
    'as' => 'tests.delete',
    'uses' => 'TestController@destroy',
]);


Route::resource('traitements', 'TraitementController');
Route::get('indexajaxTraitements','TraitementController@indexajax');


Route::get('traitements/{id}/delete', [
    'as' => 'traitements.delete',
    'uses' => 'TraitementController@destroy',
]);

Route::get('traitements/{idProfile}/{idAnnee}/edit', [
    'as' => 'traitements.edit',
    'uses' => 'TraitementController@edit',
]);


Route::resource('fournisseurs', 'FournisseurController');

Route::get('fournisseurs/{id}/delete', [
    'as' => 'fournisseurs.delete',
    'uses' => 'FournisseurController@destroy',
]);
