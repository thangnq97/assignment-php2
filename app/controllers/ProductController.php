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

            if($_FILES['image']['size'] <= 0) {
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
                $product = new ProductModel();
                $product->insert($data);
                header('location: ./product-manager');
                die;
            }

            $cates = CategoryModel::all();
            $title = 'Them moi san pham';

            return $this->view('admin/product/add-product', ['cates' => $cates, 'title' => $title, 'err' => $err]);

        }

        public function show(Request $request) {
            $id = $request->body()['id'];
            $product = ProductModel::find($id);
            $cates = CategoryModel::all();
            $title = 'Sửa sản phẩm';

            return $this->view('admin/product/edit-product', ['cates' => $cates, 'title' => $title, 'product' => $product]);
        }

        public function edit(Request $request) {
            $data = $request->body();
            if($_FILES['image']['size'] > 0) {
                $image = $_FILES['image']['name'];
                $data['image'] = $image;
                move_uploaded_file($_FILES['image']['tmp_name'], './imgs/'.$image);
            }
            $product = new ProductModel();
            $product->update($data['id'], $data);
            $msg = 'Sửa thành công';
            header("location: ./edit-product?id=".$data['id'].'&msg='.$msg);
        }

        public function delete(Request $request) {
            $id = $request->body()['id'];

            $product = new ProductModel();
            $product->delete($id);
            header("location: ./product-manager");
        }
    }

?>