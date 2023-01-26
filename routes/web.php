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

//Route::get('/', function () {
//   return view('welcome');
// });

use App\Http\Controllers\Admin\NewsController;
Route::controller(NewsController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
  Route::get('news/create', 'add')->name('news.add');
  Route::post('news/create', 'create')->name('news.create');
  Route::get('news', 'index')->name('news.index');
  Route::get('news/edit', 'edit')->name('news.edit');
  Route::post('news/edit', 'update')->name('news.update');
  Route::get('news/delete', 'delete')->name('news.delete');
});


// Route::controller(AAAController::class)->group(function(){
//     Route::get('XXX','bbb');
// });

use App\Http\Controllers\Admin\ProfileController; //管理者側プロフィール編集
Route::controller(ProfileController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function(){
  Route::get('profile/create','add')->name('profile.add');
  Route::post('profile/create', 'create')->name('profile.create');
  Route::get('profile/edit','edit')->name('profile.edit'); //画面の表示だけだからｇｅｔで良い
  Route::post('profile/edit','update')->name('profile.update');
  Route::get('profile/delete', 'delete')->name('profile.delete');
  Route::get('profile', 'index')->name('profile.index');

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\NewsController as PublicNewsController; //閲覧者側ニュース表示
Route::get('/', [PublicNewsController::class, 'index'])->name('news.index');

use App\Http\Controllers\ProfileController as PublicProfileController; //閲覧者側プロフィール一覧
Route::get('profile', [PublicProfileController::class, 'index'])->name('public_profile.index');
