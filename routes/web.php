<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\newslistController;
use App\Http\Controllers\commentController;

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
    return view('index');
});

// Route::get('show_newslist',function(){
//     return view('all_news');
// });
Route::get('news_list',[newslistController::class,'newslist']);
// Route::get('show_newslist',[newslistController::class,'show_newslist']);
Route::get('read_more/{id}',[newslistController::class,'read_more']);
Route::post('addcomment',[commentController::class,'addcomment']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
