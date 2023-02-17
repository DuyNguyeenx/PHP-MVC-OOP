<?php
use App\Router;
use App\Models\CategoryModel;
use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Controllers\CategoryController;
use App\Controllers\UserController;

require_once __DIR__ . "/../vendor/autoload.php";
session_start();

$router = new Router();
Router::get('/',[HomeController::class,'index']);
Router::get('/home',[HomeController::class,'index']);
Router::get('/contact',[HomeController::class,'contact']);
Router::get('/detail',[HomeController::class,'detail']);
Router::get('/signin',[HomeController::class,'login']);
Router::post('/signin',[HomeController::class,'check_login']);
Router::get('/signup',[HomeController::class,'signup']);
Router::get('/signup',[HomeController::class,'check_signup']);
Router::post('/post_comment', [HomeController::class, 'post_comment']);
Router::get('/cart',[HomeController::class,'cart']);
Router::post('/addProduct', [HomeController::class, 'addProduct']);
Router::get('/delete_cart', [HomeController::class, 'deleteCart']);
Router::post('/change_cart', [HomeController::class, 'changeCart']);

//admin
Router::get('/admin',[HomeController::class,'home']);
//products
Router::get('/admin/product',[ProductController::class,'index']);
Router::get('/admin/product-create',[ProductController::class,'create']);
Router::post('/admin/product-create',[ProductController::class,'store']);
Router::get('/admin/product-update',[ProductController::class,'edit']);
Router::post('/admin/product-update',[ProductController::class,'update']);
Router::get('/admin/product-delete',[ProductController::class,'delete']);
//categories
Router::get('/admin/category',[CategoryController::class,'index']);
Router::get('/admin/category-create',[CategoryController::class,'create']);
Router::post('/admin/category-create',[CategoryController::class,'store']);
Router::get('/admin/category-update',[CategoryController::class,'edit']);
Router::post('/admin/category-update',[CategoryController::class,'update']);
Router::get('/admin/category-delete',[CategoryController::class,'delete']);
$router->resolve();