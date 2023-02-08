<?php
namespace App\Controllers;
class HomeController extends Controller{
    public function index(){
        $product = [
            'name' => 'iphone',
            'price' => 1000,
        ];
        $this->view('home',['product' => $product]);
    }
    public function contact(){
        $this->view('contact');
    }
}