<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmailCampaignController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;

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

Route::post('/user-registration', [UserController::class, 'UserRegistration'])->name('user.registration');
Route::post('/user-login', [UserController::class, 'UserLogin'])->name('user.login');
Route::post('/send-otp', [UserController::class, 'SendOTPCode'])->name('send.otp');
Route::post('/verify-otp', [UserController::class, 'VerifyOTP'])->name('verify.otp');
Route::post('/reset-password', [UserController::class, 'ResetPassword'])->middleware([TokenVerificationMiddleware::class])->name('reset.password');


Route::prefix('customer')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
    Route::post('/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/read/{id}', [CustomerController::class, 'show'])->name('customer.show');
    Route::put('/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/delete/{id}', [CustomerController::class, 'destroy'])->name('customer.delete');
});


Route::post('/email-campaigns', [EmailCampaignController::class, 'index'])->name('email-campaigns.index');
Route::get('/email-campaigns/create', [EmailCampaignController::class, 'store'])->name('email-campaigns.store');
Route::post('/email-campaigns/send', [EmailCampaignController::class, 'send'])->name('email-campaigns.send');
