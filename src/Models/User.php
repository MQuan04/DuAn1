<?php

namespace Minhquan\Asm\Models;

use PDO;
use Minhquan\Asm\Model;
require_once 'global.php';

class User extends Model
{
    protected $table = 'users';
    protected $columns = [
        'name',
        'email',
        'address',
        'password',
        'role'
    ];

    public function getUserByEmailPassword($email, $password)
    {
        $sql = "
            SELECT 
                * 
            FROM {$this->table} 
            WHERE 
                email = :email 
                AND 
                password = :password 
            LIMIT 1
        ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt->fetch();
    }
}
