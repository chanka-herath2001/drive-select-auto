<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionPlanController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AnalyticsController;
use App\Http\Controllers\Admin\DashboardController;





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

Auth::routes();


Route::resource('/user', App\Http\Controllers\Admin\UserController::class)
->middleware([
    'auth',
    'role'
]);

Route::get('/dev', function () {

    // dd(\App\Http\Controllers\ContactController::class);

    // dd('Dev');

    return 'Development Function';
})->middleware([
    'auth'
]);

// Contact Form
// 1st route - show the form
Route::get('/contact', [
    App\Http\Controllers\ContactController::class,
    'show'
])->name('contact.show');

// 2nd route - form submit
Route::post('/contact', [
    App\Http\Controllers\ContactController::class,
    'store'
])->name('contact.store');

Route::resource('subscription-plans', SubscriptionPlanController::class);



Route::get('subscription-plans/{plan}/edit', 'SubscriptionPlanController@edit')->name('subscription-plans.edit');
Route::get('subscription-plans/{plan}', 'SubscriptionPlanController@show')->name('subscription-plans.show');
Route::delete('subscription-plans/{plan}', 'SubscriptionPlanController@destroy')->name('subscription-plans.destroy');


Route::post('/subscribe', [SubscriptionPlanController::class, 'subscribe'])->name('subscription.subscribe');

Route::put('subscription-plans/{plan}', 'SubscriptionPlanController@update')->name('subscription-plans.update');

Route::post('/subscribe/{plan}', [SubscriptionPlanController::class, 'subscribe'])->name('subscribe');
Route::get('/subscription/success', [SubscriptionPlanController::class, 'success'])->name('subscription.success');
Route::get('/subscription/cancel', [SubscriptionPlanController::class, 'cancel'])->name('subscription.cancel');

Route::post('/subscribe/{plan}', [SubscriptionPlanController::class, 'subscribe'])->name('subscription.subscribe');









// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth', 'can:accessAdministration'])->prefix('admin')->group(function () {
//     Route::resource('users', 'Admin\UserController');
//     Route::get('analytics', [App\Http\Controllers\Admin\AnalyticsController::class, 'index'])->name('admin.analytics.index');
// });

Route::middleware(['auth', 'can:accessAdministration'])->prefix('admin')->group(function () {
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    // Route::resource('subscription-plans', App\Http\Controllers\SubscriptionPlanController::class);
    Route::get('analytics', [App\Http\Controllers\Admin\AnalyticsController::class, 'index'])->name('admin.analytics.index');
});

// Route::middleware(['auth', 'can:accessAdministration'])->prefix('admin')->group(function () {
//     Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.user.dashboard.index');
//     Route::resource('users', App\Http\Controllers\Admin\UserController::class);
//     // Route::resource('subscription-plans', App\Http\Controllers\SubscriptionPlanController::class);
//     Route::get('analytics', [App\Http\Controllers\Admin\AnalyticsController::class, 'index'])->name('admin.analytics.index');
// });

Route::group(['middleware' => 'auth.ad'], function () {
    // Your routes that require authentication for posting ads
    Route::get('/post-ad', 'AdController@create')->name('ads.create');
    Route::post('/post-ad', 'AdController@store')->name('ads.store');
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/used-cars', [AdController::class, 'usedCars'])->name('used-cars');

Route::get('/new-cars', [AdController::class, 'newCars'])->name('new-cars');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/account', [AdController::class, 'userAds'])->name('account');




Route::get('/ads/create', [AdController::class, 'create'])->name('ads.create');

Route::post('/ads', [AdController::class, 'store'])->name('ads.store');

Route::get('/ads/{id}/click', 'AdController@click')->name('ads.click');

Route::get('/ads/{id}', [AdController::class, 'showDetails'])->name('ads.showDetails');

Route::post('/ads/search', [AdController::class, 'search'])->name('ads.search');

Route::get('/track-page-view', [AnalyticsController::class, 'trackPageView']);
Route::get('/analytics/track-click/{adId}', [AnalyticsController::class, 'trackClick']);

// Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'admin.user.dashboard.index'])->name('admin.user.dashboard.index');

Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.user.dashboard.index');
