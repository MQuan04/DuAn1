<?php
$product = $data['product'];
$arrayCategoryIdName = $data['arrayCategoryIdName'];
?>

<div class="pcoded-content">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Chi tiết sản phẩm</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="/admin/dashboard"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="/admin/products">Product</a></li>
                        <li class="breadcrumb-item"><a href="#!">Chi tiết sản phẩm</a></li>
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
                                    <h5><?= htmlspecialchars($product['name']) ?></h5>
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="<?= htmlspecialchars($product['img']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" width="100%">
                                        </div>
                                        <div class="col-md-8">
                                            <p><strong>Giá:</strong> <?= htmlspecialchars($product['price']) ?></p>
                                            <p><strong>Danh mục:</strong> <?= htmlspecialchars($arrayCategoryIdName[$product['category_id']]) ?></p>
                                            <p><strong>Trạng thái:</strong> <?= $product['is_active'] ? 'Đang bán' : 'Ngừng bán' ?></p>
                                            <p><strong>Mô tả:</strong></p>
                                            <p class="text-wrap"><?= nl2br(htmlspecialchars($product['description'])) ?></p>
                                            <a href="/admin/products/update?id=<?= $product['id'] ?>" class="btn btn-primary btn-sm">Cập nhật</a>
                                            <a href="/admin/products" class="btn btn-secondary btn-sm">Quay lại</a>
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
</div>
