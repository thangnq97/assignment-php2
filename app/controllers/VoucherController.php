<?php
    namespace App\Controllers;

use App\Models\VoucherModel;
use App\Request;

    class VoucherController extends Controller {
        public function index() {
            $vouchers = VoucherModel::all();
            $title = 'Quản lý voucher';

            return $this->view('admin/voucher/index', ['vouchers' => $vouchers, 'title' => $title]);
        }

        public function add() {
            $title = 'Thêm mới voucher';
            return $this->view('admin/voucher/add-voucher', ['title' => $title]);
        }

        public function store(Request $request) {
            $data = $request->body();

            if(!$data['name']) {
                $err['name'] = 'Tên không được để trống';
            }
            if(!$data['discount']) {
                $err['discount'] = 'Discount không được để trống';
            }
            if(!$data['quantity']) {
                $err['quantity'] = 'Số lượng không được để trống';
            }
            if(!$data['min_price']) {
                $err['min_price'] = 'Giá min không được để trống';
            }
            if(!$data['expiry']) {
                $err['expiry'] = 'Hạn dùng không được để trống';
            }

            if(!isset($err)) {
                $voucher = new VoucherModel();
                $voucher->insert($data);
                header('location: ./voucher-manager');
                die;
            }
            $title = 'Thêm mới voucher';
            return $this->view('admin/voucher/add-voucher', ['title' => $title, 'err' => $err]);
        }

        public function show(Request $request) {
            $id = $request->body()['id'];
            $voucher = VoucherModel::find($id);
            $title = 'Sửa voucher';

            return $this->view('admin/voucher/edit-voucher', ['voucher' => $voucher, 'title' => $title]);
        }

        public function edit(Request $request) {
            $data = $request->body();
            $voucher = new VoucherModel();
            $voucher->update($data['id'], $data);
            $msg = 'Sửa thành công';
            header('location: ./edit-voucher?id='.$data['id'].'&msg='.$msg);
            die;
        }

        public function delete(Request $request) {
            $id = $request->body()['id'];
            $voucher = new VoucherModel();
            $voucher->delete($id);
            header('location: ./voucher-manager');
        }
    }
?>