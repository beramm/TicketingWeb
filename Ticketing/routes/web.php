<?php

use Carbon\Carbon;
use App\Models\Concert;
use App\Models\Categories;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConcertController;
use App\Http\Controllers\DashboardConcertController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PaymentController;
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

//start route home
//end route home




Route::middleware(['auth'])->group(function () {
    Route::view('/profile', 'profile')->name('profile');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/concerts/{concert}/payment', [PaymentController::class, 'show']);
    Route::post('/postPayment', [PaymentController::class, 'store'])->name('postPayment');
});

Route::middleware(['guest'])->group(function () {
    Route::view('/login', 'sign.loginup');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/postRegister', [RegisterController::class, 'store']);
});
//start route concerts (all)
// Route::get('/concerts', function () {
//     return (view('concerts'));
// });
//Route::get('/{path?}', [HomeController::class, 'index'])->where('path', '^$|home')->name('homepage');

Route::get('/', [ConcertController::class, 'index'])->name('homepage');
Route::get('/concerts', [ConcertController::class, 'index']);
//singular
Route::get('/concerts/{concert:slug}', [ConcertController::class, 'show']);
//end route concerts (all)

//start route about
Route::get('/about', [AboutController::class, 'index']);
//end route about

Route::get('/categories/{Categories:slug}', function (Categories $Categories) {
    return view('concerts', [
        'concerts' => $Categories->Concerts
    ]);
});


Route::get('/dashboard', function () {
    if (auth()->user()->isAdmin === 1) {
        return view('dashboard.index');
    } else {
        return redirect('/'); // Redirect to another route if not an admin
    }
})->middleware('auth');



Route::resource('/dashboard/concerts', DashboardConcertController::class)->middleware('auth');
