<?php 
namespace App\Controllers;
use App\Models\CommentModel;
use App\Models\UserModel;
use App\Request;
class CommentController extends Controller {
    public function index(){
        $comments = CommentModel::all();
        $users = UserModel::all();
        // $comments->show();
        $this->view('admin/comments/list',['comments' => $comments,'users' => $users]);
    }
    public function delete(Request $request)
  {
    $data = $request->getBody();
    $new = new CommentModel;
    $new->delete($data['id']);
    header("location: /admin/comments");
    exit;
  }
}