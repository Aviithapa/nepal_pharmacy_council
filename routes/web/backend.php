<?php

//Route Dashboard

use App\Http\Controllers\Admin\CMS\BannerController;
use App\Http\Controllers\Admin\CMS\BODController;
use App\Http\Controllers\Admin\CMS\CollegeController;
use App\Http\Controllers\Admin\CMS\CpdActivitesController;
use App\Http\Controllers\Admin\CMS\GalleryController;
use App\Http\Controllers\Admin\CMS\MenuController;
use App\Http\Controllers\Admin\CMS\NewsController;
use App\Http\Controllers\Admin\CMS\PageController;
use App\Http\Controllers\Admin\CMS\PostController;
use App\Http\Controllers\Admin\CMS\PublicationController;
use App\Http\Controllers\Admin\CMS\SettingController;
use App\Http\Controllers\Admin\CMS\StaffController;
use App\Http\Controllers\Admin\CMS\SyllabusController;
use App\Http\Controllers\Admin\Count\CountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Inquiry\InquiryController;
use App\Http\Controllers\Admin\Settings\SiteSettingController;
use App\Http\Controllers\Admin\UserController;

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::resource('dashboard/user', UserController::class)->middleware(['auth']);

// CMS 
Route::resource('cms/menu', MenuController::class)->middleware(['auth']);
Route::resource('cms/post', PostController::class)->middleware(['auth']);
Route::resource('cms/news', NewsController::class)->middleware(['auth']);
Route::resource('cms/banner', BannerController::class)->middleware(['auth']);
Route::resource('cms/gallery', GalleryController::class)->middleware(['auth']);
Route::resource('cms/page', PageController::class)->middleware(['auth']);
Route::resource('cms/staff', StaffController::class)->middleware(['auth']);
Route::resource('cms/count', CountController::class)->middleware(['auth']);
Route::resource('cms/bod', BODController::class)->middleware(['auth']);
Route::resource('cms/college', CollegeController::class)->middleware(['auth'])->only('index','store','destroy');
Route::resource('cms/cpd', CpdActivitesController::class)->middleware(['auth'])->only('index','store','destroy');
Route::resource('cms/syllabus', SyllabusController::class)->middleware(['auth'])->only('index','store','destroy');
Route::resource('cms/setting', SettingController::class)->middleware(['auth'])->only('store');
Route::resource('cms/publication', PublicationController::class)->middleware(['auth'])->only('index','store','destroy');


Route::resource('inquiry', InquiryController::class)->middleware(['auth'])->only('index');
Route::post('quickNews', [NewsController::class, 'storeQuickNews'])->middleware(['auth'])->name('quick.news');
Route::delete('mediaDestroy/{media}', [NewsController::class, 'mediaDestroy'])->middleware(['auth'])->name('media.destroy');
Route::put('updateMessage/{post}', [PostController::class, 'updateMessage'])->middleware(['auth'])->name('update.message');






Route::resource('site-settings', SiteSettingController::class, [
    'names' => [
        'index' => 'dashboard.site-settings.index',
        'create' => 'dashboard.site-settings.create',
        'store' => 'dashboard.site-settings.store',
        'show' => 'dashboard.site-settings.show',
        'update' => 'dashboard.site-settings.update',
        'edit' => 'dashboard.site-settings.edit',
        'destroy' => 'dashboard.site-settings.destroy',
    ]
]);
