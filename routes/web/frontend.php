<?php

use App\Http\Controllers\Noc\NocController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;


Route::post('register', [HomeController::class, 'register'])->name('register');
Route::post('inquiry', [HomeController::class, 'storeInquiry'])->name('store.inquiry');
Route::get('news-details/{id}', [HomeController::class, 'getSingleNews'])->name('single.news');
Route::post('subscribe-newsletter', [HomeController::class, 'subscribeNewsLetter'])->name('subscribe.news-letter');
Route::post('contact', [HomeController::class, 'storeContactUsForm'])->name('contact');

Route::post('/check-result', [HomeController::class, 'check'])->name('result.check');
Route::post('/submit-otp', [NocController::class, 'sendOtp'])->name('submit.otp');
Route::post('/verify-token', [NocController::class, 'verifyToken'])->name('verify.token');
Route::get('/verify-token', [NocController::class, 'showVerifyToken'])->name('verify.token.get');
Route::get('/get-set-password', [NocController::class, 'showSetPassword'])->name('set.password.get');

Route::post('/set-password', [NocController::class, 'setPassword'])->name('set.password');

Route::get('/resend-code', [NocController::class, 'reSendOtp'])->name('re.send.otp');


Route::match(['get', 'post'], '/{slug}', [HomeController::class, 'slug'])->where('slug', '.*');
