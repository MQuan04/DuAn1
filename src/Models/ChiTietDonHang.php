<?php

namespace Minhquan\Asm\Models;

use Minhquan\Asm\Model;

class ChiTietDonHang extends Model {

    protected $table = 'chi_tiet_don_hang';

    public function findAll($column = 'id') {
        return parent::all($column);
    }

    public function findByOrderId($id_don_hang)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id_don_hang = :id_don_hang";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_don_hang', $id_don_hang, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function deleteByOrderId($id_don_hang)
    {
        $sql = "DELETE FROM {$this->table} WHERE id_don_hang = :id_don_hang";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_don_hang', $id_don_hang, \PDO::PARAM_INT);
        $stmt->execute();
    }

    
}
