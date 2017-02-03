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

Route::get('/', function () {
    return view('index');
});

Route::get('/formules', function () {
    return view('formules');
});

/*Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');*/
Route::get('/logout' , 'Auth\LoginController@logout');

Route::group(['middleware' => 'web'], function () {
	Route::auth();

	Route::resource('packages', 'PackageController');
	Route::get('/packages_json', 'PackageController@json');
	Route::resource('types', 'TypeController');
	Route::get('/types_json', 'TypeController@json');
	Route::resource('items', 'ItemController');
	Route::get('/items_json', 'ItemController@json');
	Route::resource('navigations', 'NavigationController');
	Route::get('/navigations_json', 'NavigationController@json');
	Route::resource('listitems', 'ListitemController');
	Route::get('/listitems_json', 'ListitemController@json');
	Route::resource('contents', 'ContentController');
	Route::get('/contents_json', 'ContentController@json');
	Route::resource('pictures', 'PictureController');
	Route::get('/pictures_json', 'PictureController@json');
	Route::resource('contacts', 'ContactController');
	Route::get('/contacts_json', 'PictureController@json');
	Route::resource('addresses', 'AddressController');
	Route::get('/addresses_json', 'AddressController@json');
});