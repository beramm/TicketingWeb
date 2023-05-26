<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConcertController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('homepage');
});

//route home
Route::get('/home', function () {
    return (view('homepage'));
});


//route  login
Route::get('/login', function () {
    return (view('login'));
});


//route concerts (all)
Route::get('/concerts', function () {
    return (view('concerts'));
});

Route::get('/about', function () {
    return (view('about'));
});
//route concert (singular)
Route::get('/concerts/{post:slug}', function () {
    return (view('concert'));
});
