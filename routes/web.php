<?php

use Illuminate\Support\Facades\Route;
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
//    return view('welcome');
    return view('test1');
});

// laravel旧的访问方式
//Route::get('/home/index', 'HomeController@index');
//Route::get('/hindex', 'HomeController@index');

// laravel8新的访问方式
Route::get('/hindex', [HomeController::class, 'index']);
Route::get('/home/index', [HomeController::class, 'index']);
Route::get('/home/hello', [HomeController::class, 'hello']);
Route::get('/home/res', [HomeController::class, 'res']);
Route::get('/home/viewt', [HomeController::class, 'viewt']);
Route::get('/home/dbtest', [HomeController::class, 'dbtest']);
Route::get('/home/dbtest2', [HomeController::class, 'dbtest2']);
Route::get('/home/dbtest3', [HomeController::class, 'dbtest3']);
// 集合
Route::get('/home/coll', [HomeController::class, 'coll']);

// 新闻news
Route::get('/home/news', [HomeController::class, 'news']);
