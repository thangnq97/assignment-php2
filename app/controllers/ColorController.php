<?php
    namespace App\Controllers;

use App\Models\ColorModel;
use App\Request;

    class ColorController extends Controller {
        public function index() {
            $colors = ColorModel::all();
            $title = "Quản lý màu";
            return $this->view('admin/color/index', ['colors' => $colors, 'title' => $title]);
        }

        public function add() {
            $title = 'Thêm mới màu';

            return $this->view('admin/color/add-color', ['title' => $title]);
        }

        public function store(Request $request) {
            $data = $request->body();

            if(!$data['name']) {
                $err['name'] = 'Tên không được để trống';
            }
            
            if(!isset($err)) {
                $color = new ColorModel();
                $color->insert($data);
                header('location: ./color-manager');
                die;
            }

            $title = 'Thêm mới màu';
            return $this->view('admin/color/add-color', ['title' => $title, 'err' => $err]);
        }

        public function show(Request $request) {
            $id = $request->body()['id'];
            $title = 'Sửa màu';

            $color = ColorModel::find($id);
            return $this->view('admin/color/edit-color', ['title' => $title, 'color' => $color]);
        }

        public function edit(Request $request) {
            $data = $request->body();
            $color = new ColorModel();
            $color->update($data['id'], $data);
            $msg = 'Sửa thành công';
            header('location: ./edit-color?id='.$data['id'].'&msg='.$msg);
        }

        public function delete(Request $request) {
            $id = $request->body()['id'];

            $color = new ColorModel();
            $color->delete($id);
            header('location: ./color-manager');
        }
    }
?>