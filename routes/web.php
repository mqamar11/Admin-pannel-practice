<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


// Route::name('admin.')->prefix('admin')->namespace('Admin')->group(function () {
// });


//........................Company CRUD.................................//

Route::middleware(['auth'])->group(function () {
    Route::get('admin', 'AdminController@index')->name('dashboard');
Route::get('company', 'CompanyController@index')->name('company.list');
Route::get('company/create', 'CompanyController@create')->name('company.create');
Route::post('company/store', 'CompanyController@store')->name('company.store');
Route::get('company/edit/{id}', 'CompanyController@edit')->name('company.edit');
Route::put('company/edit/{id}', 'CompanyController@update')->name('company.update');
Route::delete('company/{id}', 'CompanyController@destroy')->name('company.destroy');
Route::get('company/export/xl', 'CompanyController@exportxl');
Route::get('company/export/pdf', 'CompanyController@exportpdf');



//.......................Training CRUD....................................//
Route::get('training', 'TrainingController@index')->name('training.list');
Route::get('training/create', 'TrainingController@create')->name('training.create');
Route::post('training/store', 'TrainingController@store')->name('training.store');
Route::get('training/edit/{id}', 'TrainingController@edit')->name('training.edit');
Route::put('training/edit/{id}','TrainingController@update')->name('training.update');
Route::delete('training/{id}','TrainingController@destroy')->name('training.destroy');

//.........................User CRUD.....................................//
Route::get('user', 'UserController@index')->name('user.list');
Route::get('user/create', 'UserController@create')->name('user.create');
Route::post('user/store', 'UserController@store')->name('user.store');
Route::get('user/edit/{id}', 'UserController@edit')->name('user.edit');
Route::put('user/edit/{id}', 'UserController@update')->name('user.update');
Route::delete('user/{id}', 'UserController@destroy')->name('user.destroy');
});

//.............................Authentication..........................................//
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
