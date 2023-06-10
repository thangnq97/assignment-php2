<?php
    namespace App\Controllers;

use App\Models\ColorModel;
use App\Models\ProductColorModel;
use App\Models\ProductModel;
use App\Request;

    class ProductColorController extends Controller {
        public function index() {
            $pro_color = ProductColorModel::all();
            $products = ProductModel::all();
            $colors = ColorModel::all();
            $title = 'Quản lý giá';

            return $this->view('admin/product-color/index', ['pro_color' => $pro_color, 'products' => $products, 'colors' => $colors, 'title' => $title]);
        }

        public function add() {
            $title = 'Thêm mới biến thể';
            $products = ProductModel::all();
            $colors = ColorModel::all();
            return $this->view('admin/product-color/add', ['products' => $products, 'colors' => $colors, 'title' => $title]);
        }

        public function store(Request $request) {
            $data = $request->body();

            if(!$data['price']) {
                $err['price'] = 'Giá không được để trống';
            }
            if(!$err){
                $item = new ProductColorModel();
                $item->insert($data);
                header('location: ./pro_color-manager');
            }
            $title = 'Thêm mới biến thể';
            $products = ProductModel::all();
            $colors = ColorModel::all();
            return $this->view('admin/product-color/add', ['products' => $products, 'colors' => $colors, 'title' => $title, 'err' => $err]);
        }

        public function show(Request $request) {
            $title = 'Sửa biến thể';
            $id = $request->body()['id'];
            $item = ProductColorModel::find($id);
            $products = ProductModel::all();
            $colors = ColorModel::all();

            return $this->view('admin/product-color/edit', ['title' => $title, 'item' => $item, 'products' => $products, 'colors' => $colors]);
        }

        public function edit(Request $request) {
            $item = new ProductColorModel();
            $data = $request->body();
            $item->update($data['id'], $data);
            $msg = 'Sửa thành công';

            header('location: ./edit-pro_color?id='.$data['id'].'&msg='.$msg);
            die;
        }

        public function delete(Request $request) {
            $id = $request->body()['id'];
            $item = new ProductColorModel();
            $item->delete($id);
            header('location: ./pro_color-manager');
            die;
        }
    }
?>