<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group([
    'middleware' => "auth:web"
], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('send/{id}', [MessageController::class, 'create'])->name('Message.send')->middleware(['CountVisit']);

    Route::post('store/{id}', [MessageController::class, 'store'])->name('Message.store')->middleware(['StoreConstraint']);

    Route::get('visits', [HomeController::class, 'lastTenVisists'])->name('last_ten_visits');
});
