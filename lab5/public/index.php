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
$router->resolve();
