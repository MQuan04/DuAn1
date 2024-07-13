<?php

namespace Minhquan\Asm;

class Model
{
    protected $conn;
    protected $table;
    protected $columns = []; // Khai báo mảng columns để sử dụng trong các phương thức CRUD

    public function __construct()
    {
        try {
            $host = 'localhost';
            $dbname = 'da1';
            $username = 'root';
            $password = '';

            $this->conn = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);

            // set the PDO error mode to exception
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function findOne($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function all($column = 'id')
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY {$column} DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insert($data)
    {
        $sql = "INSERT INTO {$this->table} (" . implode(", ", array_keys($data)) . ") VALUES (:" . implode(", :", array_keys($data)) . ")";

        $stmt = $this->conn->prepare($sql);

        foreach ($data as $key => &$value) {
            $stmt->bindParam(":{$key}", $value);
        }

        $stmt->execute();
    }

    public function update($data, $conditions = [])
    {
        $set = [];
        foreach ($data as $key => $value) {
            if (in_array($key, $this->columns)) {
                $set[] = "{$key} = :{$key}";
            }
        }
        $set = implode(", ", $set);

        $where = [];
        foreach ($conditions as $condition) {
            $link = isset($condition[3]) ? $condition[3] : '';
            $where[] = "{$condition[0]} {$condition[1]} :w_{$condition[0]} {$link}";
        }
        $where = implode(" ", $where);

        $sql = "UPDATE {$this->table} SET {$set} WHERE {$where}";

        $stmt = $this->conn->prepare($sql);

        foreach ($data as $key => &$value) {
            if (in_array($key, $this->columns)) {
                $stmt->bindParam(":{$key}", $value);
            }
        }

        foreach ($conditions as &$condition) {
            $stmt->bindParam(":w_{$condition[0]}", $condition[2]);
        }

        $stmt->execute();
    }

    public function delete($conditions = [])
    {
        $where = [];
        foreach ($conditions as $condition) {
            $link = isset($condition[3]) ? $condition[3] : '';
            $where[] = "{$condition[0]} {$condition[1]} :w_{$condition[0]} {$link}";
        }
        $where = implode(" ", $where);

        $sql = "DELETE FROM {$this->table} WHERE {$where}";

        $stmt = $this->conn->prepare($sql);

        foreach ($conditions as &$condition) {
            $stmt->bindParam(":w_{$condition[0]}", $condition[2]);
        }

        $stmt->execute();
    }

    public function __destruct()
    {
        $this->conn = null;
    }
}
