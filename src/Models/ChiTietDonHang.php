<?php

namespace Minhquan\Asm\Models;

use Minhquan\Asm\Model;

class ChiTietDonHang extends Model {

    protected $table = 'chi_tiet_don_hang';

    public function findAll($column = 'id') {
        return parent::all($column);
    }

    public function findByOrderId($orderId) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$orderId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
