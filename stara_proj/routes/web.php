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
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('projects', 'ProjectController@index')->name('projects');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');

	Route::get('customer_form', function () {
		return view('customer_form');
	})->name('customer_form');

	Route::get('worker_form', function () {
		return view('worker_form');
	})->name('worker_form');
	
	Route::get('project/{id}/edit', ['as' => 'project.edit', 'uses' => 'ProjectController@edit']);
	Route::get('project/{id}', ['as' => 'project.view', 'uses' => 'ProjectController@view']);
	Route::put('project/update', ['as' => 'project.update', 'uses' => 'ProjectController@update']);

	Route::post('customer_form/save', ['as' => 'customer_form.save', 'uses' => 'CustomerFormController@save']);
	Route::post('send_message', ['as' => 'send_message', 'uses' => 'ProjectController@send_message']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

