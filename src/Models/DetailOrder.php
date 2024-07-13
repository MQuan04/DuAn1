<?php

namespace Minhquan\Asm\Models;

use Minhquan\Asm\Model;

class OrderDetailModel extends Model
{
    protected $table = 'chi_tiet_don_hang';

    public function findByOrderId($orderId) {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE don_hang_id = ? AND deleted_at IS NULL");
        $stmt->execute([$orderId]);
        return $stmt->fetchAll();
    }

    public function deleteByOrderId($id_don_hang)
    {
        $sql = "DELETE FROM {$this->table} WHERE id_don_hang = :id_don_hang";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_don_hang', $id_don_hang, \PDO::PARAM_INT);
        $stmt->execute();
    }
}
