<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionPlanController;
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




Route::put('subscription-plans/{plan}', 'SubscriptionPlanController@update')->name('subscription-plans.update');





// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

