<?php 
namespace App\Models;

use App\Model;

class User extends Model {
    protected $table = "users";

    public function checkExistEmail($email) {
        $queryBuilder = $this->connection->createQueryBuilder();

        $queryBuilder->select('COUNT(*)')
            ->from($this->table)
            ->where('email = :email')
            ->setParameter('email', $email);

        $result = $queryBuilder->fetchOne();
        
        return $result > 0; //true nếu email đã tồn tại, ngược lại thì false
    }

    public function getUserByEmail($email) {
        $queryBuilder = $this->connection->createQueryBuilder();

        $queryBuilder->select('*')
            ->from($this->table)
            ->where('email = :email')
            ->setParameter('email', $email);

        return $queryBuilder->fetchAssociative();
    }
}

?>
