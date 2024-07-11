<?php

use Minhquan\Asm\Controllers\Admin\UserController;
use Minhquan\Asm\Controllers\Admin\CategoryController;
use Minhquan\Asm\Controllers\Admin\DashboardController;
use Minhquan\Asm\Controllers\Admin\ProductController;
use Minhquan\Asm\Controllers\Admin\OrderController as AdminOrderController;
use Minhquan\Asm\Controllers\Client\HomeController;
use Minhquan\Asm\Router;

$router = new Router();

$router->addRoute('/', HomeController::class, 'index');

$router->addRoute('/admin/dashboard', DashboardController::class, 'index');

$router->addRoute('/admin/users', UserController::class, 'index');
$router->addRoute('/admin/users/create', UserController::class, 'create');
$router->addRoute('/admin/users/update', UserController::class, 'update');
$router->addRoute('/admin/users/delete', UserController::class, 'delete');

$router->addRoute('/admin/categories', CategoryController::class, 'index');
$router->addRoute('/admin/categories/create', CategoryController::class, 'create');
$router->addRoute('/admin/categories/update', CategoryController::class, 'update');
$router->addRoute('/admin/categories/delete', CategoryController::class, 'delete');

$router->addRoute('/admin/products', ProductController::class, 'index');
$router->addRoute('/admin/products/create', ProductController::class, 'create');
$router->addRoute('/admin/products/update', ProductController::class, 'update');
$router->addRoute('/admin/products/detail', ProductController::class, 'detail');
$router->addRoute('/admin/products/delete', ProductController::class, 'delete');

// Thêm các route cho quản lý đơn hàng
$router->addRoute('/admin/orders', AdminOrderController::class, 'index');
$router->addRoute('/admin/orders/detail', AdminOrderController::class, 'detail');
$router->addRoute('/admin/orders/update', AdminOrderController::class, 'update');
$router->addRoute('/admin/orders/delete', AdminOrderController::class, 'delete');
