<?php
    namespace App\Controllers;

use App\Models\BillDetailModel;
use App\Models\BillModel;
use App\Models\ColorModel;
use App\Models\CommentModel;
use App\Models\ProductColorModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use App\Models\VoucherModel;
use App\Request;
use PDO;

    class HomeController extends Controller {
        protected $id;
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
            $all_products = ProductModel::all();
            $count = ceil((count($all_products) / 8));

            return $this->view('client/shop', ['title' => $title, 'products' => $products, 'count' => $count]);
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

            if($product->quantity <= 0) {
                $check = false;
            }else {
                $check = true;
            }

            return $this->view('client/product-detail',['title' => $title,
                                                        'product' => $product,
                                                        'price' => $price, 
                                                        'colors' => $colors,
                                                        'comments' => $comments,
                                                        'users' => $users,
                                                        'user' => $user,
                                                        'check' => $check

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

            if(!isset($err)) {
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
            unset($_SESSION['toltal_price']);
            
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
            $data = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
            $title = 'Cart';
            $products = ProductModel::all();
            $colors = ColorModel::all();
            $total_price = 0;
            foreach($data as $item) {
                $total_price += ($item['price'] * $item['quantity']);
            }
            $_SESSION['total_price'] = $total_price;
            $now = date('Y-m-d');
            $voucher = new VoucherModel();
            $vouchers = $voucher->where('min_price', '<=', "$total_price")->andWhere('quantity', '>', 0)->andWhere('expiry', '>=', $now)->get();

            return $this->view('client/cart', ['title' => $title,
                                                'data' => $data,
                                                'products' => $products,
                                                'colors' => $colors,
                                                'total_price' => $total_price,
                                                'vouchers' => $vouchers
                                                ]);
        }

        public function removeCart(Request $request) {
            $key = $request->body()['key'];
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            header('location: ./cart');
            die;
        }

        public function viewConfirm(Request $request) {
            if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                header('location: ./shop?page=1');
                die;
            }
            $title = 'Confirm';
            $voucher = ($request->body()['voucher_id'] == 0) ? null : $request->body()['voucher_id'];
            
            return $this->view('client/confirm', ['title' => $title, 'voucher' => $voucher]);
        }

        public function addBillDetail($id, $arr = []) {
            $data['bill_id'] = $id;

            $pro_id = $arr['product_id'];
            $color_id = $arr['color_id'];
            $item = new ProductColorModel();
            $pro_color_id = $item->where('product_id', '=', "$pro_id")->andWhere('color_id', '=', "$color_id")->get()[0];
            $pro_color_id = $pro_color_id->id;

            $data['pro_color_id'] = $pro_color_id;
            $data['total_price'] = $arr['price'];
            $data['quantity'] = $arr['quantity'];

            $bill_detail = new BillDetailModel();
            $bill_detail->insert($data);
        }

        public function confirm(Request $request) {
            if(!isset($_SESSION['cart'])) {
                header('location: ./');
                die;
            }
            $data = $request->body();

            if(!$data['fullname']) {
                $err['fullname'] = 'Họ tên không được để trống';
            }
            if(!$data['email']) {
                $err['email'] = 'Email không được để trống';
            }
            if(!$data['address']) {
                $err['address'] = 'Địa chỉ không được để trống';
            }
            if(!$data['phone']) {
                $err['phone'] = 'Số điện thoại không được để trống';
            }

            if(!isset($err)) {
                $voucher_id = $data['voucher_id'];

                if(!empty($voucher_id)) {
                    $voucher = new VoucherModel();
                    $discount = $voucher->where('id', '=', "$voucher_id")->get()[0];
                    $quantity = $discount->quantity - 1;
                    $voucher->update($voucher_id, ['quantity' => $quantity]);
                    $discount = $discount->discount;
                    $_SESSION['total_price'] -= $discount;
                } else {
                    unset($data['voucher_id']);
                }
                $data['total_price'] = $_SESSION['total_price'];

                if(isset($_SESSION['user'])) {
                    $data['user_id'] = $_SESSION['user']['id'];
                }

                

                $bill = new BillModel();
                $conn = $bill->insert($data);
                $id = $conn->lastInsertId();

                foreach($_SESSION['cart'] as $item) {
                    $this->addBillDetail($id, $item);

                    $product_id = $item['product_id'];
                    $item = new ProductModel();
                    $product = $item->where('id', '=', "$product_id")->get()[0];
                    $product_quantity = $product->quantity - 1;
                    $item->update($product_id, ['quantity' => $product_quantity]);
                }

                unset($_SESSION['cart']);
                unset($_SESSION['total_price']);

                $msg = 'Đặt hàng thành công';
                $title = 'Confirm';
            
                return $this->view('client/confirm', ['title' => $title, 'msg' => $msg]);
            }

            $title = 'Confirm';
            $voucher = ($request->body()['voucher_id'] == 0) ? null : $request->body()['voucher_id'];
            
            return $this->view('client/confirm', ['title' => $title, 'voucher' => $voucher, 'err' => $err]);
        }

        public function addComment(Request $request) {
            $data = $request->body();
            $data['user_id'] = $_SESSION['user']['id'];

            $comment = new CommentModel();
            $comment->insert($data);
            header('location: ./product-detail?id='.$data['product_id']);
            die;
        }

        public function history() {
            $vouchers = VoucherModel::all();
            $title = 'History';
            $id = $_SESSION['user']['id'];

            $bill = new BillModel();
            $bills = $bill->where('user_id', '=', "$id")->get();

            return $this->view('client/history', ['title' => $title, 'bills' => $bills, 'vouchers' => $vouchers]);
        }

        public function historyDetail(Request $request) {
            $id = $request->body()['id'];
            $title = 'Chi tiết bill';
            $item = new BillDetailModel();
            $bill_detail = $item->where('bill_id', '=', "$id")->get();
            $data = [];
            foreach($bill_detail as $item) {
                $pro_color_id = $item->pro_color_id;
                $pro_color = ProductColorModel::find($pro_color_id);
                $product = ProductModel::find($pro_color->product_id)->name;
                $color = ColorModel::find($pro_color->color_id)->name;
                $detail_id = $item->id;
                $quantity = $item->quantity;
                $total_price = $item->total_price;
                array_push($data, ['product' => $product, 'color' => $color, 'id' => $detail_id, 'quantity' => $quantity, 'total_price' => $total_price]);
            }

            return $this->view('client/history-detail', ['title' => $title, 'data' => $data]);
        }
    }
?>