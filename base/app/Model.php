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

    //hàm lấy danh sách bản ghi
    public function getAll() //hàm lấy danh sách bản ghi
    {
        $queryBuilder = $this->connection->createQueryBuilder(); //khởi tạo queryBuilder
    
        $queryBuilder->select('*')->from($this->table);

        return $queryBuilder->fetchAllAssociative(); //lấy danh sách nhiều
    }

    //hàm lấy thông tin chi tiết dựa vào id
    public function getOne($id) 
    {
        $queryBuilder = $this->connection->createQueryBuilder();
        $queryBuilder->select('*')
            ->from($this->table)
            ->where('id = :id')
            ->setParameter('id', $id);

        return $queryBuilder->fetchAssociative(); //lấy 1 bản ghi duy nhất
    }

    //hàm thêm bản ghi mới vào DB
    public function insert(array $data) {
        $this->connection->insert($this->table, $data);

        return $this->connection->lastInsertId();
    }

    //hàm cập nhật bản ghi theo id
    public function update($id, array $data) {
        return $this->connection->update($this->table, $data, ['id' => $id]);
    }

    //hàm xóa bản ghi theo id
    public function delete($id) {
        return $this->connection->delete($this->table, ['id' => $id]);
    }
}
?>