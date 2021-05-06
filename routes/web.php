<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('/login');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

Route::group(['middleware' => ['role:student']], function() {
    Route::get('dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
});

Route::group(['middleware' => ['role:administrator']], function() {
    Route::get('dashboard/users', 'App\Http\Controllers\DashboardController@getUsers')->name('dashboard.users');
});

Route::group(['middleware' => ['role:administrator']], function() {
    Route::get('dashboard/users/createstudent', 'App\Http\Controllers\AdminController@createStudent')->name('dashboard.users.createstudent');
});

Route::group(['middleware' => ['role:administrator']], function() {
    Route::post('dashboard/users/storestudent', 'App\Http\Controllers\AdminController@storeStudent')->name('dashboard.users.storestudent');
});

Route::group(['middleware' => ['role:administrator']], function() {
    Route::get('dashboard/users/createprofessor', 'App\Http\Controllers\AdminController@createProfessor')->name('dashboard.users.createprofessor');
});

Route::group(['middleware' => ['role:administrator']], function() {
    Route::post('dashboard/users/storeprofessor', 'App\Http\Controllers\AdminController@storeProfessor')->name('dashboard.users.storeprofessor');
});

Route::group(['middleware' => ['role:administrator']], function() {
    Route::get('dashboard/users/createadmin', 'App\Http\Controllers\AdminController@createAdmin')->name('dashboard.users.createadmin');
});

Route::group(['middleware' => ['role:administrator']], function() {
    Route::post('dashboard/users/storeadmin', 'App\Http\Controllers\AdminController@storeAdmin')->name('dashboard.users.storeadmin');
});

Route::group(['middleware' => ['role:administrator']], function() {
    Route::post('dashboard/users/deletestudent', 'App\Http\Controllers\AdminController@deleteStudent')->name('dashboard.users.deletestudent');
});

Route::group(['middleware' => ['role:administrator']], function() {
    Route::post('dashboard/users/deleteprofessor', 'App\Http\Controllers\AdminController@deleteProfessor')->name('dashboard.users.deleteprofessor');
});

Route::group(['middleware' => ['role:administrator']], function() {
    Route::post('dashboard/users/deleteadmin', 'App\Http\Controllers\AdminController@deleteAdmin')->name('dashboard.users.deleteadmin');
});

require __DIR__.'/auth.php';
