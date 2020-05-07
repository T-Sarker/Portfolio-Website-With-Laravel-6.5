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

Route::get('/admin/profile/edit-profile-data/{id}/{name}',[
	'uses' => 'ProfileController@editProfile',
	'as'   => 'edit-profile-data'
]);

Route::post('/admin/profile/update-profile-details',[
	'uses' => 'ProfileController@updateProfile',
	'as'   => 'update-profile-details'
]);

Route::get('/admin/about/add-about',[
	'uses' => 'AboutController@addAbout',
	'as'   => 'add-about'
]);

Route::post('/admin/about/add-about-details',[
	'uses' => 'AboutController@insertAbout',
	'as'   => 'add-about-details'
]);

Route::get('/admin/about/manage-about',[
	'uses' => 'AboutController@manageAbout',
	'as'   => 'manage-about'
]);

Route::get('admin/about/edit-about-data/{id}/{name}',[
	'uses' => 'AboutController@editAbout',
	'as'   => 'edit-about-data'
]);

Route::post('admin/about/update-about-details',[
	'uses' => 'AboutController@updateAbout',
	'as'   => 'update-about-details'
]);

Route::post('/admin/about/delete-about',[
	'uses' => 'AboutController@deleteAbout',
	'as'   => 'delete-about'
]);

Route::get('/admin/service/add-service',[
	'uses' => 'ServiceController@addService',
	'as'   => 'add-service'
]);

Route::post('admin/service/insert-service',[
	'uses' => 'ServiceController@insertService',
	'as'   => 'insert-service'
]);

Route::get('/admin/service/manage-service',[
	'uses' => 'ServiceController@manageService',
	'as'   => 'manage-service'
]);

Route::get('admin/service/edit-service-data/{id}/{name}',[
	'uses' => 'ServiceController@editService',
	'as'   => 'edit-service-data'
]);

Route::post('/admin/service/update-service',[
	'uses' => 'ServiceController@updateService',
	'as'   => 'update-service'
]);

Route::get('/admin/portfolio/add-protfolio-heading',[
	'uses' => 'GalleryController@addProtfolioHeading',
	'as'   => 'add-protfolio-heading'
]);

Route::post('/admin/portfolio/save-gallery-group-name',[
	'uses' => 'GalleryController@saveGallery',
	'as'   => 'save-gallery-group-name'
]);

Route::get('/admin/portfolio/add-protfolio-content',[

	'uses' => 'GalleryController@galleryContent',
	'as'   => 'add-protfolio-content'
]);

Route::post('admin/portfolio/insert-Gallery-media',[
	'uses' => 'GalleryMediaController@insertMedia',
	'as'   => 'insert-Gallery-media'
]);

Route::get('admin/portfolio/manage-protfolio-content',[
	'uses' => 'GalleryMediaController@manageGallery',
	'as'   => 'manage-protfolio-content'
]);

Route::get('admin/portfolio/edit-gallery-media-data/{id}/{name}',[
	'uses' => 'GalleryMediaController@editGalleryMedia',
	'as'   => 'edit-gallery-media-data'
]);

Route::post('admin/portfolio/update-Gallery-media',[
	'uses' => 'GalleryMediaController@updateGalleryMedia',
	'as'   => 'update-Gallery-media'
]);

Route::post('admin/portfolio/delete-gallery-media',[
	'uses' => 'GalleryMediaController@deleteMedia',
	'as'   => 'delete-gallery-media'
]);

Route::get('admin/client/add-client',[
	'uses' => 'ClientController@addClient',
	'as'   => 'add-client'
]);

Route::post('admin/client/insert-client-message',[
	'uses' => 'ClientController@insertClientMessage',
	'as'   => 'insert-client-message'
]);

Route::get('admin/client/manage-client',[
	'uses' => 'ClientController@manageClient',
	'as'   => 'manage-client'
]);

Route::get('admin/client/edit-client-data/{id}/{name}',[
	'uses' => 'ClientController@editClient',
	'as'   => 'edit-client-data'
]);

Route::post('admin/client/update-client-message',[
	'uses' => 'ClientController@updateClient',
	'as'   => 'update-client-message'
]);