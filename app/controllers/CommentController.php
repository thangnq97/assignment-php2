<?php
    namespace App\Controllers;

use App\Models\CommentModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use App\Request;

    class CommentController extends Controller {
        public function index() {
            $users = UserModel::all();
            $products = ProductModel::all();
            $comments = CommentModel::all();
            $title = 'Quản lý comment';

            return $this->view('admin/comment/index', ['comments' => $comments, 'title' => $title, 'users' => $users, 'products' => $products]);
        }

        public function delete(Request $request) {
            $id = $request->body()['id'];
            $cmt = new CommentModel();
            $cmt->delete($id);
            header('location: ./comment-manager');
            die;
        }
    }
?>