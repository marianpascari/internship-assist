<?php

use App\Models\User;
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
    return view('login-page');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/student', function () {
    return view('student');
});

Route::get('/professor', function () {
    return view('student');
});

Route::get('/admin/users', function () {
    $users = User::all();
    //dd($users[0]->email);

    return view('users', [
        'users' => $users
    ]);
});
