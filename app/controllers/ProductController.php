<?php
    namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Request;

    class ProductController extends Controller{
        public function index() {
            $products = ProductModel::all();
            $cates = CategoryModel::all();
            $title = 'Quan ly san pham';

            return $this->view('admin/product/index', ['products' => $products, 'cates' => $cates, 'title' => $title]);
        }

        public function add() {
            $cates = CategoryModel::all();
            $title = 'Them moi san pham';

            return $this->view('admin/product/add-product', ['cates' => $cates, 'title' => $title]);
        }

        public function store(Request $request) {
            $data = $request->body();

            if($_FILES['image']['size'] < 0) {
                $err['image'] = 'Hình ảnh không được để trống';
            }
            if(!$data['name']) {
                $err['name'] = 'Tên không được để trống';
            }
            if(!$data['quantity']) {
                $err['quantity'] = 'Số lượng không được để trống';
            }
            if(!$data['detail']) {
                $err['detail'] = 'Chi tiết sản phẩm không được để trống';
            }

            if(!$err) {
                $image = $_FILES['image']['name'];
                $data['image'] = $image;
                move_uploaded_file($_FILES['image']['tmp_name'], './imgs/'.$image);
                header('location: ./product-manager');
                die;
            }

            $cates = CategoryModel::all();
            $title = 'Them moi san pham';

            return $this->view('admin/product/add-product', ['cates' => $cates, 'title' => $title, 'err' => $err]);

        }
    }

?>