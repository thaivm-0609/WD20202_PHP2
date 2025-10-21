<?php
//khai báo namespace cho class/interface/trait/...
namespace App;

//đây là controller cha, các controller con trong thư mục controllers
//sẽ kế thừa lại từ class này
class Controller {
    public function uploadFile(array $file) {
        //lấy thông tin của file upload lên
        $tmpPath = $file['tmp_name']; //lấy đường dẫn tạm thời của file
        $fileName = time().'-'.$file['name']; //thêm thời gian upload để tránh bị trùng file
        $uploadDir = 'storages/uploads/'; //khai báo nơi lưu trữ ảnh được upload lên
        //nếu chưa tồn tại thư mục uploads thì tạo thư mục uploads
        if(!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        //khai báo đường dẫn cuối = đường dẫn thư mục uploads + tên file
        $finalPath = $uploadDir.$fileName;

        //chuyển file từ đường dẫn tạm thời sang đường dẫn cuối
        if (move_uploaded_file($tmpPath, $finalPath)) {
            return $finalPath;
        }

        throw new \Exception('Lỗi upload file');
    }

    public function validate($validator, $data, $rules) {
        $validation = $validator->make($data, $rules);
        $validation->validate(); //gọi hàm validate của thư viện Rakit/validation
        if ($validation->fails()) { //nếu bắt được lỗi dữ liệu thì trả về lỗi 
            return $validation->errors()->firstOfAll();
        }

        return [];
    }
}
?>
