<?php
    namespace App\Controllers;

use App\Models\ColorModel;
use App\Models\CommentModel;
use App\Models\ProductColorModel;
use App\Models\ProductModel;
use App\Models\UserModel;
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
            $pro_color_id = $pro_color->where('product_id', '=', "$id")->get();
            $arr = [];
            foreach($pro_color_id as $item) {
                array_push($arr,$item->color_id);
            }
            
            $colors = new ColorModel();
            $colors = $colors->findIn($arr)->get();

            $comments = new CommentModel();
            $comments = $comments->where("product_id", "=", "$id")->get();

            $users = UserModel::all();
            $user = isset($_SESSION['user']) ? $_SESSION['user'] : null;

            return $this->view('client/product-detail',['title' => $title,
                                                        'product' => $product,
                                                        'price' => $price, 
                                                        'colors' => $colors,
                                                        'comments' => $comments,
                                                        'users' => $users,
                                                        'user' => $user

            ]);
        }

        public function viewRegister() {
            $title = 'Register';
            return $this->view('client/register', ['title' => $title]);
        }

        public function register(Request $request) {
            $data = $request->body();

            if(!$data['username']) {
                $err['username'] = 'username không được để trống';
            }
            if(!$data['email']) {
                $err['email'] = 'email không được để trống';
            }
            if(!$data['password']) {
                $err['password'] = 'password không được để trống';
            }

            $users = UserModel::all();
            foreach($users as $user) {
                if($user->username === $data['username']) {
                    $err['username'] = 'username đã tồn tại';
                }
                if($user->email === $data['email']) {
                    $err['email'] = 'email đã có người sử dụng';
                }
            }

            if(!$err) {
                $user = new UserModel();
                $user->insert($data);
                header('location : ./sign-in');
                die;
            }

            $title = 'Register';
            return $this->view('client/register', ['title' => $title, 'err' => $err]);
        }

        public function viewSignIn() {
            if(!empty($_SESSION['user'])) {
                header('location: ./');
                die;
            }
            $title = 'Sign in';
            return $this->view('client/sign-in', ['title' => $title]);
        }

        public function signIn(Request $request) {
            
            $data = $request->body();
            $users = UserModel::all();
            foreach($users as $user) {
                if($user->username !== $data['username'] && $user->password !== $data['password']) {
                    $err['signin'] = 'Tài khoản hoặc mật khẩu không đúng';
                }
            }

            if(!$err) {
                $user = new UserModel();
                $username = $data['username'];
                $password = $data['password'];
                $user = $user->where('username', '=', "$username")->andWhere('password', '=', "$password")->get();
                $_SESSION['user']['username'] = $user[0]->username;
                $_SESSION['user']['role'] = $user[0]->role;
                $_SESSION['user']['id'] = $user[0]->id;
                header('location: ./');
                die;
            }

            $title = 'Sign in';
            return $this->view('client/sign-in', ['title' => $title, 'err' => $err]);
        }

        public function signOut() {
            unset($_SESSION['user']);
            unset($_SESSION['cart']);
            
            header('location: ./sign-in');
        }

        public function pages() {
            $title = 'Pages';
            return $this->view('client/pages',['title' => $title]);
        }

        public function blog() {
            $title = 'Blog';
            return $this->view('client/blog',['title' => $title]);
        }

        public function addCart(Request $request) {
            $_SESSION['cart'] = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
            $product_id = $request->body()['product_id']; 
            $color_id = $request->body()['color_id'];
            $item = new ProductColorModel();
            $item = $item->where('product_id', '=', "$product_id")->andWhere('color_id', '=', "$color_id")->get()[0];
            array_push($_SESSION['cart'], ['quantity' => $request->body()['quantity'], 'product_id' => $item->product_id, 'color_id' => $item->color_id, 'price' => $item->price]);
            header('location: ./cart');
        }

        public function showCart() {
            $data = $_SESSION['cart'];
            $title = 'Cart';
            $products = ProductModel::all();
            $colors = ColorModel::all();
            $total_price = 0;
            foreach($data as $item) {
                $total_price += ($item['price'] * $item['quantity']);
            }
            return $this->view('client/cart', ['title' => $title,
                                                'data' => $data,
                                                'products' => $products,
                                                'colors' => $colors,
                                                'total_price' => $total_price
                                                ]);
        }

        public function removeCart(Request $request) {
            $key = $request->body()['key'];
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            header('location: ./cart');
            die;
        }
    }
?>