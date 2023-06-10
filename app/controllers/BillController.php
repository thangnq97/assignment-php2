<?php
    namespace App\Controllers;

use App\Models\BillDetailModel;
use App\Models\BillModel;
use App\Models\ColorModel;
use App\Models\ProductColorModel;
use App\Models\ProductModel;
use App\Models\VoucherModel;
use App\Request;

    class BillController extends Controller {
        public function index() {
            $bills = BillModel::all();
            $vouchers = VoucherModel::all();
            $title = 'Quản lý bill';

            return $this->view('admin/bill/index', ['bills' => $bills, 'vouchers' => $vouchers, 'title' => $title]);
        }

        public function show(Request $request) {
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

            return $this->view('admin/bill/detail', ['title' => $title, 'data' => $data]);
        }

        public function update(Request $request) {
            $id = $request->body()['id'];
            $bill = BillModel::find($id);
            
            if($bill->status === 'Đã hủy') {
                header('location: ./bill-manager');
                die;
            }
            $status = ($bill->status === 'Đang xử lý') ? 'Vận chuyển' : 'Thành công';
            $item = new BillModel();
            $item->update($id, ['status' => $status]);
            header('location: ./bill-manager');
            die;
        }

        public function cancel(Request $request) {
            $id = $request->body()['id'];
            $bill = BillModel::find($id);
            $status = $bill->status;

            $status = ($status !== 'Thành công') ? 'Đã hủy' : 'Thành công';

            $item = new BillModel();
            $item->update($id, ['status' => $status]);
            header('location: ./bill-manager');
            die;
        }
    }
?>