<?php
namespace App\Controllers;

use App\Request;
use App\Models\UserModel;
use App\Models\CommentModel;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Controllers\Controller;

class HomeController extends Controller
{
  public function index()
  {
    $products = ProductModel::all();
    $this->view('site/home', ['products' => $products]);
  }

  public function contact()
  {
    $this->view('site/contact', []);
  }
  public function detail(Request $request)
  {
    $data = $request->getBody();
    $products = ProductModel::findOne($data['id']);
    $categories = CategoryModel::all();
    $hds = new ProductModel;
    $hdss = $hds->getTable('*')->wheree('category_id', $products->category_id)->limit(3)->get();
    $comment = new CommentModel;
    $comments = $comment->getTable('full_name,description,comments.id,created_at,image')->Join('users')->On('id_user', 'users.id')->wheree('id_pro', $products->id)->get();
    return $this->view('site/detail', ['product' => $products, 'categories' => $categories, 'comments' => $comments, 'hds' => $hdss]);
  }
  public function login(Request $request)
  {
    $this->view('site/signin', []);
  }
  public function check_login(Request $request)
  {
    $user = $request->getBody();
    $users = UserModel::all();
    foreach ($users as $key) {
      if ($key->email == $user['email'] && $key->pass == $user['pass']) {
        $_SESSION['user'] = $key;
        header('Location:/home');
      }
    }
  }

  public function signup()
  {
    $this->view('site/signup', []);
  }
  public function check_signup(Request $request)
  {
    $new_user = $request->getBody();
    $users = UserModel::all();
    $image = $_FILES['image']['name'];
    $new_user['image'] = $image;
    //Upload file
    move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $image);
    $new = new UserModel;
    $new->insert($new_user);
    header('location:/signin');
  }
  public function post_comment(Request $request)
  {
    $comment = $request->getBody();
    $id_pro = $_GET['id'];
    $id_user = $_SESSION['user']->id;
    $data = [
      'description' => $comment['description'],
      'id_user' => $id_user,
      'id_pro' => $id_pro,
    ];
    $Com = new CommentModel;
    $Com->insert($data);
    header("location:/detail?id=$id_pro");
  }
  public function addProduct(Request $request)
  {
    $product = $request->getBody();
    if (!isset($_SESSION['products'])) {
      $_SESSION['products'] = [];
    }
    array_push($_SESSION['products'], $product);
    header('location:/cart');
  }
  public function cart(Request $request)
  {
    $cart = $_SESSION['products'];
    $total = 0;
    
    $this->view('site/cart', ['cart' => $cart, 'total' => $total]);
  }
  public function deleteCart(Request $request)
  {
    $id = $request->getBody();
    array_splice($_SESSION['products'], $id['id'], 1);
    header('location:/cart');
    exit;
  }
  public function changeCart(Request $request)
  {
    $qty =  $request->getBody();
    $quantity = $_POST['numberQuantity'];
    foreach ($_SESSION['products'] as $key => $value) {
      $_SESSION['products'][$key]['numberQuantity'] = $quantity[$key];
    }
    header('location:/cart');
  }
  public function delete_session()
  {
    session_destroy();
    header('location:/home');
  }
  public function home()
  {
    $this->view('admin/home/index', []);
  }
}