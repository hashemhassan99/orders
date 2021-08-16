<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::resource('users',\App\Http\Controllers\UserController::class);
Route::get('notifications',[\App\Http\Controllers\Maintenance::class,'notification'])->name('notifications');
Route::resource('maintenance',\App\Http\Controllers\Maintenance::class);
Route::resource('statues',\App\Http\Controllers\StatusController::class);
Route::resource('resources',\App\Http\Controllers\ResourceController::class);
Route::get('maintaince/change_status/{id}', [\App\Http\Controllers\Maintenance::class,'changeStatus'])->name('maintaince.changeStatus');
Route::get('resource/change_status/{id}', [\App\Http\Controllers\ResourceController::class,'changeStatus'])->name('resource.changeStatus');
Route::get('statues/change_status/{id}', [\App\Http\Controllers\StatusController::class,'changeStatus'])->name('status.changeStatus');


