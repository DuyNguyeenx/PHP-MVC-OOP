<?php

namespace App\Controllers;

use App\Models\ProductModel;

class HomeController extends Controller
{
    public function index()
    {
        $product = [
            'name' => 'Iphone',
            'price' => 1000
        ];
        $this->view('home', ['product' => $product]);
    }

    public function contact()
    {
        $this->view('contact');
    }

    public function show()
    {
        $products = ProductModel::all();
        // var_dump($products);
        $this->view('site/showproduct', ['products' => $products]);
    }
}
