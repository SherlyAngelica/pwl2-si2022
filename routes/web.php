<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;

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

//main page
Route::get('/', function () {
    return view('index');
})->name('welcome');

// Route::get('/', [HomeController::class, 'welcome']);

// Route::get('login', function () {
//     return view('auth.user.login');
// });

//login
Route::get("sign-in-google", [UserController::class, 'google'])->name('user.login.google');
Route::get("auth/google/callback", [UserController::class, 'handleProviderCallback'])->name('user.google.callback');

//dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('checkout/success', function () {
    return view('checkout.success');
});

//cuma test route aja
Route::get('/test', function () {
    return 'Test Route bisa atau gak';
});

Route::get('checkout/{camp:slug}', function () {
    return view('checkout.create');
})->name('checkout.create');

// Route::middleware('auth')->group(function () {
    Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('checkout/{camp:slug}', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::post('checkout/{camp}', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('dashboard/checkout/invoice/{checkout}', [CheckoutController::class, 'invoice'])->name('user.checkout.invoice');
// });

require __DIR__.'/auth.php';
