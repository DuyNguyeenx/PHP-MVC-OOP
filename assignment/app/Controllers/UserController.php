<?php 
namespace App\Controllers;
use App\Models\UserModel;

class UserController extends Controller {
    public function index(){
        
        $users = UserModel::all();
        // $comments->show();
        $this->view('admin/users/list',['users' => $users]);
    }
    
}