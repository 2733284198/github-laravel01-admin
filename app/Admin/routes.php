<?php

use Illuminate\Routing\Router;
use App\Http\Controllers\HomeController;
use App\Admin\Controllers\UsersController;
use App\Admin\Controllers\NewsController;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.as'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    /* 正确的 */
    $router->resource('/news', 'NewsController');
    $router->resource('/users', 'UsersController');

    /* 错误的 */
//    $router->resource(‘/brand’, ‘BrandController’);
    //    $router->resource('news', NewsController::class);

});
