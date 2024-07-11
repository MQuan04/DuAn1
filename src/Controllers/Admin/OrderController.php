<?php

namespace Minhquan\Asm\Controllers\Admin;

use Minhquan\Asm\Controller;
use Minhquan\Asm\Models\DonHang;
use Minhquan\Asm\Models\ChiTietDonHang;

class OrderController extends Controller {

    public function index() {
        $don_hang = (new DonHang())->all();
        $this->renderAdmin("orders/index", ["don_hang" => $don_hang]);
    }

    public function detail() {
        $id = $_GET['id'];
        $don_hang = (new DonHang())->find($id);
        $chi_tiet_don_hang = (new ChiTietDonHang())->findByOrderId($id);
        $this->renderAdmin("orders/detail", ["don_hang" => $don_hang, "chi_tiet_don_hang" => $chi_tiet_don_hang]);
    }

    public function update() {
        $id = $_POST['id'];
        $trang_thai = $_POST['status'];
        (new DonHang())->updateStatus($id, $trang_thai);
        header("Location: /admin/orders/detail?id=$id");
    }

    public function delete() {
        $id = $_POST['id'];
        $don_hang = (new DonHang())->find($id);
        if ($don_hang['trang_thai'] == 'huy' || $don_hang['trang_thai'] == 'error') {
            (new DonHang())->delete(['id' => $id]);
        }
        header("Location: /admin/orders");
    }
}
