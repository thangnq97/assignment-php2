<?php
    namespace App\Controllers;

use App\Models\CategoryModel;
use App\Request;

    class CategoryController extends Controller {
        public function index() {
            $cates = CategoryModel::all();
            $title = 'Quản lý danh mục';

            return $this->view('admin/category/index', ['cates' => $cates, 'title' => $title]);
        }

        public function add() {
            $title = 'Thêm mới danh mục';

            return $this->view('admin/category/add-category', ['title' => $title]);
        }

        public function store(Request $request) {
            $data = $request->body();

            if(!$data['name']) {
                $err['name'] = 'Tên không được để trống';
            }
            
            if(!$err) {
                $cate = new CategoryModel();
                $cate->insert($data);
                header('location: ./category-manager');
                die;
            }

            $title = 'Thêm mới danh mục';
            return $this->view('admin/category/add-category', ['title' => $title, 'err' => $err]);
        }

        public function show(Request $request) {
            $id = $request->body()['id'];
            $title = 'Sửa danh mục';

            $cate = CategoryModel::find($id);
            return $this->view('admin/category/edit-category', ['title' => $title, 'cate' => $cate]);
        }

        public function edit(Request $request) {
            $data = $request->body();
            $cate = new CategoryModel();
            $cate->update($data['id'], $data);
            $msg = 'Sửa thành công';
            header('location: ./edit-category?id='.$data['id'].'&msg='.$msg);
        }

        public function delete(Request $request) {
            $id = $request->body()['id'];

            $cate = new CategoryModel();
            $cate->delete($id);
            header('location: ./category-manager');
        }
    }
?>