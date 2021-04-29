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

require __DIR__.'/auth.php';
