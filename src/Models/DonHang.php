<?php

namespace Minhquan\Asm\Models;

use Minhquan\Asm\Model;

class DonHang extends Model {

    protected $table = 'don_hang';

    // Thay đổi phương thức all để trả về danh sách các bản ghi
    public function getAll($column = 'id') {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE deleted_at IS NULL ORDER BY $column");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id = ? AND deleted_at IS NULL");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function updateStatus($id, $status) {
        $stmt = $this->conn->prepare("UPDATE $this->table SET trang_thai = ? WHERE id = ?");
        return $stmt->execute([$status, $id]);
    }

    public function delete($conditions = []) {
        if (isset($conditions['id'])) {
            $id = $conditions['id'];
            $stmt = $this->conn->prepare("UPDATE $this->table SET deleted_at = NOW() WHERE id = ?");
            return $stmt->execute([$id]);
        }
        return false;
    }
}
