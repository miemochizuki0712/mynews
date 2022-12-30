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

use App\Http\Controllers\Admin\NewsController;
Route::controller(NewsController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('news/create', 'add')->name('news.add');
    Route::post('news/create', 'create')->name('news.create');
});


// Route::controller(AAAController::class)->group(function(){
//     Route::get('XXX','bbb');
// });

use App\Http\Controllers\Admin\ProfileController;
Route::controller(ProfileController::class)->name('admin.')->middleware('auth')->group(function(){
    Route::get('admin/profile/create','add')->name('news.add');
    Route::post('admin/profile/create', 'create')->name('profile.create');
    Route::get('admin/profile/edit','edit')->middleware('auth');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
