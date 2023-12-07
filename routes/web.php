<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\CheckoutController as AdminCheckout;
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

//midtrans
Route::get("payment/success", [CheckoutController::class, 'midtransCallback']);
Route::get("payment/success", [CheckoutController::class, 'midtransCallback']);

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
    Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success')->middleware('ensureUserRole::user');
    Route::get('checkout/{camp:slug}', [CheckoutController::class, 'create'])->name('checkout.create')->middleware('ensureUserRole::user');
    Route::post('checkout/{camp}', [CheckoutController::class, 'store'])->name('checkout.store')->middleware('ensureUserRole::user');
    //dashboard biasa
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('dashboard/checkout/invoice/{checkout}', [CheckoutController::class, 'invoice'])->name('user.checkout.invoice');
    //dashboard User
    Route::prefix('user/dashboard')->namespace('User')->name('user.')->middleware('ensureUserRole:user')->group(function() {
        Route::get('/',[UserDashboard::class, 'index'])->name('dashboard');
    });
    //dashnoard Admin
    Route::prefix('admin/dashboard')->namespace('Admin')->name('admin.')->middleware('ensureUserRole:admin')->group(function() {
        Route::get('/',[AdminDashboard::class, 'index'])->name('dashboard');
        Route::post('checkout/{checkout}',[AdminCheckout::class,'update'])->name('checkout.update');
    });
// });

require __DIR__.'/auth.php';
