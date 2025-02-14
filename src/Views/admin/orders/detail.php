<?php
$don_hang = $data['don_hang'];
$chi_tiet_don_hang = $data['chi_tiet_don_hang'];
?>

<div class="pcoded-content">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Chi tiết đơn hàng</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="/admin/dashboard"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="/admin/orders">Đơn hàng</a></li>
                        <li class="breadcrumb-item"><a href="#!">Chi tiết đơn hàng</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Chi tiết đơn hàng <?= isset($don_hang['id']) ? htmlspecialchars($don_hang['id']) : '' ?></h5>
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>Tên người đặt:</strong> <?= isset($don_hang['ten_nguoi_dat']) ? htmlspecialchars($don_hang['ten_nguoi_dat']) : '' ?></p>
                                            <p><strong>Số điện thoại:</strong> <?= isset($don_hang['so_dien_thoai']) ? htmlspecialchars($don_hang['so_dien_thoai']) : '' ?></p>
                                            <p><strong>Địa chỉ:</strong> <?= isset($don_hang['dia_chi']) ? htmlspecialchars($don_hang['dia_chi']) : '' ?></p>
                                            <p><strong>Phương thức thanh toán:</strong> <?= isset($don_hang['phuong_thuc_thanh_toan']) ? htmlspecialchars($don_hang['phuong_thuc_thanh_toan']) : '' ?></p>
                                            <p><strong>Trạng thái:</strong> <?= isset($don_hang['trang_thai']) ? htmlspecialchars($don_hang['trang_thai']) : '' ?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>Thời gian đặt:</strong> <?= isset($don_hang['thoi_gian_dat']) ? htmlspecialchars($don_hang['thoi_gian_dat']) : '' ?></p>
                                            <p><strong>Tổng tiền:</strong> <?= isset($don_hang['tong_tien']) ? htmlspecialchars($don_hang['tong_tien']) : '' ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <h5>Sản phẩm trong đơn hàng</h5>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Tên sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Giá</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($chi_tiet_don_hang as $detail) : ?>
                                                <tr>
                                                    <td><?= isset($detail['ten_san_pham']) ? htmlspecialchars($detail['ten_san_pham']) : '' ?></td>
                                                    <td><?= isset($detail['so_luong']) ? htmlspecialchars($detail['so_luong']) : '' ?></td>
                                                    <td><?= isset($detail['gia']) ? htmlspecialchars($detail['gia']) : '' ?></td>
                                                    <td><?= isset($detail['so_luong']) && isset($detail['gia']) ? htmlspecialchars($detail['so_luong'] * $detail['gia']) : '' ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <form action="/admin/orders/update" method="post">
                                        <input type="hidden" name="id" value="<?= isset($don_hang['id']) ? htmlspecialchars($don_hang['id']) : '' ?>">
                                        <div class="form-group">
                                            <label for="status">Trạng thái đơn hàng</label>
                                            <select class="form-control" id="status" name="status">
                                                <option value="chua_xac_nhan" <?= isset($don_hang['trang_thai']) && $don_hang['trang_thai'] == 'chua_xac_nhan' ? 'selected' : '' ?>>Chưa xác nhận</option>
                                                <option value="xac_nhan" <?= isset($don_hang['trang_thai']) && $don_hang['trang_thai'] == 'xac_nhan' ? 'selected' : '' ?>>Xác nhận</option>
                                                <option value="chua_thanh_toan" <?= isset($don_hang['trang_thai']) && $don_hang['trang_thai'] == 'chua_thanh_toan' ? 'selected' : '' ?>>Chưa thanh toán</option>
                                                <option value="da_thanh_toan" <?= isset($don_hang['trang_thai']) && $don_hang['trang_thai'] == 'da_thanh_toan' ? 'selected' : '' ?>>Đã thanh toán</option>
                                                <option value="dang_giao" <?= isset($don_hang['trang_thai']) && $don_hang['trang_thai'] == 'dang_giao' ? 'selected' : '' ?>>Đang giao</option>
                                                <option value="da_giao" <?= isset($don_hang['trang_thai']) && $don_hang['trang_thai'] == 'da_giao' ? 'selected' : '' ?>>Đã giao</option>
                                                <option value="huy" <?= isset($don_hang['trang_thai']) && $don_hang['trang_thai'] == 'huy' ? 'selected' : '' ?>>Hủy</option>
                                                <option value="thanh_cong" <?= isset($don_hang['trang_thai']) && $don_hang['trang_thai'] == 'thanh_cong' ? 'selected' : '' ?>>Thành công</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Cập nhật trạng thái</button>
                                        <a href="/admin/orders" class="btn btn-secondary btn-sm">Quay lại</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
