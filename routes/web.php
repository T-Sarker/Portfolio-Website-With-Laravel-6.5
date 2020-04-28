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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// **************************************************************************************************************************

Route::get('/',[

	'uses' => 'PortfolioController@index',
	'as'   =>'/'
]);

Route::get('/admin/logo/add-logo',[
	'uses' => 'LogoController@addLogo',
	'as'   => 'add-logo'
]);

Route::post('/admin/logo/logo-save',[
	'uses' => 'LogoController@saveLogo',
	'as'   => 'save-logo'
]);

Route::get('/admin/profile/add-profile-details',[
	'uses' => 'ProfileController@saveProfile',
	'as'   => 'add-profile-details'
]);

Route::post('/admin/profile/save-profile-details',[
	'uses' => 'ProfileController@saveProfileDetails',
	'as'   => 'save-profile-details'
]);

Route::get('/admin/profile/manage-profile-details',[
	'uses' => 'ProfileController@showManageProfile',
	'as'   => 'manage-profile-details'
]);