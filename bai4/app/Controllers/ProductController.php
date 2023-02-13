<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = ProductModel::all();
        return $this->view('admin/products/list', ['products' => $products]);
    }
    public function create()
    {
        $categories = CategoryModel::all();
        return $this->view('admin/products/add', ['categories' => $categories]);
    }
    public function store(Request $request)
    {
        $product = $request->getBody();
        $image = $_FILES['image']['name'];
        $product['image'] = $image;
        //Upload file
        move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $image);

        //insert
        $p = new ProductModel();
        $p->insert($product);
        header("location:/php2/PHP-MVC/bai4/public/product");
    }
}