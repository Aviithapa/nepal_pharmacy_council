<?php

//Route Dashboard

use App\Http\Controllers\Admin\CMS\BannerController;
use App\Http\Controllers\Admin\CMS\BODController;
use App\Http\Controllers\Admin\CMS\CodeOfConductController;
use App\Http\Controllers\Admin\CMS\CollegeController;
use App\Http\Controllers\Admin\CMS\CpdActivitesController;
use App\Http\Controllers\Admin\CMS\GalleryController;
use App\Http\Controllers\Admin\CMS\GuidelinesController;
use App\Http\Controllers\Admin\CMS\MenuController;
use App\Http\Controllers\Admin\CMS\NewsController;
use App\Http\Controllers\Admin\CMS\NocController as CMSNocController;
use App\Http\Controllers\Admin\CMS\PageController;
use App\Http\Controllers\Admin\CMS\PostController;
use App\Http\Controllers\Admin\CMS\PublicationController;
use App\Http\Controllers\Admin\CMS\RegulationsController;
use App\Http\Controllers\Admin\CMS\SettingController;
use App\Http\Controllers\Admin\CMS\StaffController;
use App\Http\Controllers\Admin\CMS\SyllabusController;
use App\Http\Controllers\Admin\Count\CountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Inquiry\InquiryController;
use App\Http\Controllers\Admin\NOC\NOCController;
use App\Http\Controllers\Admin\Settings\SiteSettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\GoodStanding\GoodStandingController;

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::resource('dashboard/user', UserController::class)->middleware(['auth']);

// CMS 
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('cms/menu', MenuController::class);
    Route::resource('cms/post', PostController::class);
    Route::resource('cms/news', NewsController::class);
    Route::resource('cms/banner', BannerController::class);
    Route::resource('cms/gallery', GalleryController::class);
    Route::resource('cms/page', PageController::class);
    Route::resource('cms/staff', StaffController::class);
    Route::resource('cms/count', CountController::class);
    Route::resource('cms/bod', BODController::class);
    Route::resource('cms/college', CollegeController::class)->only('index', 'store', 'destroy');
    Route::resource('cms/cpd', CpdActivitesController::class)->only('index', 'store', 'destroy');
    Route::resource('cms/syllabus', SyllabusController::class)->only('index', 'store', 'destroy');
    Route::resource('cms/setting', SettingController::class)->only('store');
    Route::resource('cms/publication', PublicationController::class)->only('index', 'store', 'destroy');
    Route::resource('cms/guidelines', GuidelinesController::class)->only('index', 'store', 'destroy');
    Route::resource('cms/regulations', RegulationsController::class)->only('index', 'store', 'destroy');
    Route::resource('cms/coc', CodeOfConductController::class)->only('index', 'store', 'destroy');
    Route::resource('cms/noc-main', CMSNocController::class)->only('index', 'show', 'update');
    Route::put('cms/noc-approve/{id}', [CMSNocController::class, 'approve'])->name('noc.approve');
    Route::post('cms/store-data', [CMSNocController::class, 'storeData'])->name('applicant.store');

    
    Route::resource('inquiry', InquiryController::class)->only('index');
    Route::post('quickNews', [NewsController::class, 'storeQuickNews'])->name('quick.news');
    Route::delete('mediaDestroy/{media}', [NewsController::class, 'mediaDestroy'])->name('media.destroy');
    Route::put('updateMessage/{post}', [PostController::class, 'updateMessage'])->name('update.message');
    Route::post('uploadResult', [NewsController::class, 'uploadResult'])->name('upload.result');
});



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

//NOC
Route::resource('backend/noc', NOCController::class)->middleware(['auth']);

Route::resource('backend/good-standing', GoodStandingController::class)->middleware(['auth']);
