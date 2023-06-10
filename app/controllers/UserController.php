<?php
    namespace App\Controllers;

use App\Models\UserModel;
use App\Request;

    class UserController extends Controller {
        public function index() {
            $users = UserModel::all();
            $title = 'Quản lý user';

            return $this->view('admin/user/index', ['users' => $users, 'title' => $title]);
        }

        public function delete(Request $request) {
            $id = $request->body()['id'];
            $user = new UserModel();
            $user->delete($id);
            header('location: ./user-manager');
        }
    }
?>