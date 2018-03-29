<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('/user', userController::class);
    $router->resource('/banner', bannerController::class);
    $router->resource('/category', categoryController::class);
    $router->resource('/detail', productDetailController::class);
    $router->resource('/description', prodDescController::class);
    $router->resource('/transaction', transactionController::class);

    $router->resource('/invoice', invoiceController::class);
    $router->resource('/cart', cartController::class);



});
