<?php
$don_hang = $data['don_hang'] ?? [];

?>

<div class="pcoded-content">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Danh sách đơn hàng</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="/admin/dashboard"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Đơn hàng</a></li>
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
                                    <h5>Danh sách đơn hàng</h5>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Mã đơn hàng</th>
                                                    <th>Tên người đặt</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Trạng thái đơn hàng</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($don_hang as $order) : ?>
                                                    <tr>
                                                        <td><?= $order['id'] ?></td>
                                                        <td><?= $order['ten_nguoi_dat'] ?></td>
                                                        <td><?= $order['so_dien_thoai'] ?></td>
                                                        <td><?= $order['tong_tien'] ?></td>
                                                        <td><?= $order['trang_thai'] ?></td>
                                                        <td style="width: 1px;" class="text-nowrap">
                                                            <a href="/admin/orders/detail?id=<?= $order['id'] ?>" class="btn btn-sm btn-secondary">Chi tiết</a>
                                                            <form action="/admin/orders/delete?id=<?= $order['id'] ?>" method="post" style="display:inline;">
                                                                <button type="submit" onclick="return confirm('Bạn có chắc chắn xóa?');" class="btn btn-danger btn-sm">Xóa</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
