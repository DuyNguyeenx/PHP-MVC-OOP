<?php
namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Request;

class HomeController extends Controller{
  public function index(){
    $products = ProductModel::all();
    $oderBy = ProductModel::top('ngaytao',3);
    $tops = ProductModel::top('gia',3);
    $this->view('home',['products' => $products,
  'oderBy' => $oderBy,'tops' => $tops]);
  }

  public function contact(){
    $this->view('contact',[]);

  }
  public function show(){
    $products = ProductModel::all();
    $this->view('product',['products' => $products]);
  }
  public function list(){
    $products = ProductModel::all();
    $this->view('list-product',['products' => $products]);
  }
  public function create()
  {
    $categories = CategoryModel::all();
      return $this->view('add-product', ['categories' => $categories]);
  }
  public function store(Request $request)
  {
      $product = $request->getBody();
      $image = $_FILES['hinh']['name'];
      $product['hinh'] = $image;
      //Upload file
      move_uploaded_file($_FILES['hinh']['tmp_name'], 'images/' . $image);

      //insert
      $p = new ProductModel();
      $p->insert($product);
      header("location:/list-product");
  }

  public function show_update(Request $request)
  {
      $p = $request->getBody();
      $product = ProductModel::findOne($p['id']);
      $categories = CategoryModel::all();


      return $this->view(
          'update-product',
          [
              'product' => $product,
              'categories' => $categories
          ]
      );
  }

  public function update(Request $request)
  {
      $data = $request->getBody();
      if ($_FILES['hinh']['size'] > 0) {
          $data['hinh'] = $_FILES['hinh']['name'];
          move_uploaded_file($_FILES['hinh']['tmp_name'], 'images/' . $data['hinh']);
      }

      //update
      ProductModel::findOne($data['id'])->update($data);
      header("location:/list-product");
      exit;
  }
  public function delete(Request $request)
  {
      $id = $request->getBody()['id'];
      $product = new ProductModel();
      $product->delete($id);

      setcookie('message', 'Xóa dữ liệu thành công!', time() + 1);

      header("location:/list-product");
      exit;
  }
}