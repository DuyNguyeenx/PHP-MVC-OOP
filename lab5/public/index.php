<?php
require_once __DIR__ . "/../vendor/autoload.php";

use App\Controllers\HomeController;
use App\Models\CategoryModel;
use App\Router;



$router = new Router;
Router::get('/', function(){
  echo "HOME PAGE";
});
Router::get('/contact', [HomeController::class ,'contact']);
Router::get('/home',[HomeController::class , 'index']);
Router::get('/product',[HomeController::class , 'show']);
Router::get('/list-product',[HomeController::class , 'list']);
Router::get('/create-product',[HomeController::class , 'create']);
Router::post('/create-product',[HomeController::class , 'store']);
Router::get('/update-product',[HomeController::class , 'show_update']);
Router::post('/update-product',[HomeController::class , 'update']);
Router::get('/delete-product',[HomeController::class , 'delete']);

$router->resolve();
