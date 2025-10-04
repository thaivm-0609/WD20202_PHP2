<?php 

namespace App\Controllers;

use App\Controller;
use App\Models\Contest;

class ContestController extends Controller {
    private Contest $contest; //khởi tạo object contest từ class Model Contest
    
    public function __construct()
    {
        $this->contest = new Contest();
    }

    public function index() {
        $data = $this->contest->findAll(); //dữ liệu lấy từ db được lưu vào biến $data
    
        return view('admin.contests.list', compact('data')); //trả dữ liệu $data ra giao diện
    }

    public function getDetail($id) {
        $data = $this->contest->findOne($id);

        return view('admin.contests.detail', compact('data'));
    }

    public function create() {
        return view('admin.contests.create'); 
    }

    public function store() {
        try {
            $data = $_POST + $_FILES;
            //upload file
            if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) { //kiểm tra điều kiện nếu có up file và dung lượng file khác 0
                $data['image'] = $this->uploadFile($data['image']);
            } else {
                $data['image'] = null;
            }

            $this->contest->store($data); //thêm mới bản ghi
            redirect('/contests');
        } catch (\Throwable $th) {
            redirect('/contest/create');
        }
    }

    public function edit($id) {
        //B1: tìm bản ghi cũ theo $id
        $contest = $this->contest->findOne($id); 
        if(empty($contest)) {
            notFound();
        }

        return view('admin.contests.edit', compact('contest'));
    }

    public function update($id) {
        //B1: tìm bản ghi cũ theo $id
        $contest = $this->contest->findOne($id); 
        if(empty($contest)) {
            notFound();
        }

        //B2: lấy dữ liệu từ form và cập nhật
        try {
            $data = $_POST + $_FILES;
            //upload file
            if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) { //kiểm tra điều kiện nếu có up file và dung lượng file khác 0
                $data['image'] = $this->uploadFile($data['image']);
            } else {
                $data['image'] = null;
            }

            $this->contest->update($id, $data); //cập nhật bản ghi
            redirect('/contests');
        } catch (\Throwable $th) {
            redirect('/contest/edit/'.$id);
        }
    }

    public function delete($id) {
        //B1: tìm bản ghi cũ theo $id
        $contest = $this->contest->findOne($id); 
        if(empty($contest)) { //nếu ko tồn tại bản ghi => not found
            notFound();
        }

        $this->contest->delete($id); //xóa bản ghi
        if($contest['image'] && file_exists($contest['image'])) { //xóa ảnh của bản ghi bị xóa
            unlink($contest['image']);
        }

        redirect('/contests');
    }
}

?>