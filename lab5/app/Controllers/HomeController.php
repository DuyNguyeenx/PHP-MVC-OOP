<?php
namespace App\Controllers;

use App\Models\ProductModel;

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
}