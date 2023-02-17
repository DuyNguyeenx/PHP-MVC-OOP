<?php
namespace App\Controllers;

use App\Models\ProductModel;
use App\Request;
use App\Models\CategoryModel;
use App\Models\BrandModel;

class ProductController extends Controller
{
    public function index()
    {
        $products = ProductModel::all();
        $this->view('admin/products/list', ['products' => $products]);
    }

    public function create()
    {
        $brands = BrandModel::all();
        $categories = CategoryModel::all();
        return $this->view('admin/products/create', [
            'categories' => $categories,
            'brands' => $brands
        ]); 
    }
    public function store(Request $request)
    {
        $product = $request->getBody();
        $image = $_FILES['images']['name'];
        $product['images'] = $image;
        //Upload file
        move_uploaded_file($_FILES['images']['tmp_name'], 'images/' . $image);
        //insert
        $p = new ProductModel();
        $p->insert($product);
        header("location:/admin/product");
        exit;
    }
    public function edit(Request $request)
    {
        $p = $request->getBody();
        $product = ProductModel::findOne($p['id']);
        $categories = CategoryModel::all();
        $brands = BrandModel::all();
        return $this->view('admin/products/update', ['product' => $product, 'categories' => $categories,'brands' => $brands]);
    }
    public function update(Request $request)
    {
        $data = $request->getBody();
        if ($_FILES['images']['size'] > 0) {
            $data['images'] = $_FILES['images']['name'];
            move_uploaded_file($_FILES['images']['tmp_name'], 'images/' . $data['images']);
        }
        ProductModel::findOne($data['id'])->update($data);
        header("location: /admin/product");
        exit;
    }
    public function delete(Request $request)
    {
        $data = $request->getBody();
        $new = new ProductModel;
        $new->delete($data['id']);
        header("location: /admin/product");
        exit;
    }
}