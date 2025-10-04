<?php
namespace App;

use Doctrine\DBAL\DriverManager;

//đây là model cha, các model con trong thư mục models
//sẽ kế thừa lại từ class này
class Model {
    protected $connection; //tạo kết nối
    protected $table; //tên bảng sẽ truy vấn

    public function __construct()
    {
        //khai báo thông tin kết nối từ file .env
        $connectionInfo = [
            'dbname' => $_ENV['DB_NAME'],
            'user' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
            'host' => $_ENV['DB_HOST'],
            'port' => $_ENV['DB_PORT'],
            'driver' => $_ENV['DB_DRIVER'],
        ];
        
        $this->connection = DriverManager::getConnection($connectionInfo);
    }

    public function __destruct()
    {
        $this->connection->close(); //đóng kết nối với database
    }

    public function getAll() //hàm lấy danh sách bản ghi
    {
        $queryBuilder = $this->connection->createQueryBuilder(); //khởi tạo queryBuilder
    
        $queryBuilder->select('*')->from($this->table);

        return $queryBuilder->fetchAllAssociative(); //lấy danh sách nhiều
    }

    public function getOne($id) 
    {
        $queryBuilder = $this->connection->createQueryBuilder();
        $queryBuilder->select('*')
            ->from($this->table)
            ->where('id = :id')
            ->setParameter('id', $id);

        return $queryBuilder->fetchAssociative(); //lấy 1 bản ghi duy nhất
    }
}
?>