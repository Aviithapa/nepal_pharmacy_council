<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;


Route::post('register', [HomeController::class, 'register'])->name('register');
Route::post('inquiry', [HomeController::class, 'storeInquiry'])->name('store.inquiry');
Route::get('news-details/{id}', [HomeController::class, 'getSingleNews'])->name('single.news');
Route::post('subscribe-newsletter', [HomeController::class, 'subscribeNewsLetter'])->name('subscribe.news-letter');
Route::post('contact', [HomeController::class, 'storeContactUsForm'])->name('contact');


Route::match(['get', 'post'], '/{slug}', [HomeController::class, 'slug'])->where('slug', '.*');
