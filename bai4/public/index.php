<?php
use App\Controllers\HomeController;
use App\Models\CategoryModel;
use App\Router;
require_once __DIR__ . "/../vendor/autoload.php";
// $cate = new CategoryModel;
// $prd = new ProductModel;
// var_dump(CategoryModel::all());
// echo "<br>";
// var_dump($cate->getOne(15));
// $cate->insert(
//     [
//         'cate_name' => 'ASUS',
//         'slug' => 'kkkk',
//         'desc' => 'in2015'
//     ]
// );
// $cate->delete(27);
// $cate->update(['cate_name' => 'gilet'],3);
// $data = ['cate_name' => 'oppo'];
// $result = CategoryModel::findOne(15)->update($data);
// $result = CategoryModel::findOne(15);
// print_r($result);
// $result = $cate->where('cate_name', '=', 'Samsung')->orWhere('desc', '=', 'skirt');
// var_dump($result->get());



$router = new Router;
Router::get('/', function(){
  echo "HOME PAGE";
});
Router::get('/contact', [HomeController::class ,'contact']);

Router::get('/home',[HomeController::class , 'index']);
$router->resolve();
