<?php
    namespace App\Controllers;

use App\Models\ProductColorModel;
use App\Models\ProductModel;
use App\Request;

    class HomeController extends Controller {
        public function index() {
            $product = new ProductModel();
            $top4 = $product->take(0,4)->get();
            $top8 = $product->take(3,8)->get();
            $title = 'Trang chủ';


            return $this->view('client/index',['top4' => $top4, 'top8' => $top8, 'title' => $title]);
        }

        public function shop(Request $request) {
            $title = 'Shop';
            $page = $request->body()['page'];
            $product = new ProductModel();
            $from = ($page == 1) ? 0 : (($page - 1) * 8);
            $products = $product->take($from, 8)->get();

            return $this->view('client/shop', ['title' => $title, 'products' => $products]);
        }

        public function detail(Request $request) {
            $id = $request->body()['id'];
            $product = ProductModel::find($id);
            $pro_color = new ProductColorModel();
            $item = $pro_color->where('product_id', '=', "$id")->andWhere('color_id', '=', '2')->get();
            $price = $item[0]->price;
            $title = 'Chi tiết sản phẩm';

            return $this->view('client/product-detail',['title' => $title, 'product' => $product, 'price' => $price]);
        }
    }
?>